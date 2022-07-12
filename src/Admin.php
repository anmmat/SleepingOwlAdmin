<?php

namespace SleepingOwl\Admin;

use Closure;
use Collective\Html\HtmlServiceProvider;
use Exception;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\ProviderRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use SleepingOwl\Admin\Configuration\ProvidesScriptVariables;
use SleepingOwl\Admin\Contracts\AdminInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Contracts\ModelConfigurationInterface;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;
use SleepingOwl\Admin\Contracts\Template\MetaInterface;
use SleepingOwl\Admin\Contracts\Template\TemplateInterface;
use SleepingOwl\Admin\Http\Controllers\AdminController;
use SleepingOwl\Admin\Model\ModelCollection;
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Providers\AdminServiceProvider;
use SleepingOwl\Admin\Providers\AliasesServiceProvider;
use SleepingOwl\Admin\Providers\BreadcrumbsServiceProvider;

/**
 * Class Admin.
 *
 * @property \Illuminate\Foundation\Application $app
 */
class Admin implements AdminInterface
{
    use ProvidesScriptVariables;

    /**
     * @var ModelConfigurationInterface[]|ModelCollection
     */
    protected $models;

    /**
     * @var TemplateInterface
     */
    protected $template;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var ConfigRepository
     */
    protected $config;

    /**
     * @var array
     */
    protected $missedSections = [];

    /**
     * Admin constructor.
     *
     * @param  Application  $application
     */
    public function __construct(Application $application)
    {
        $this->app = $application;
        $this->models = new ModelCollection();
        $this->config = new ConfigRepository(
            $this->app['config']->get('sleeping_owl', [])
        );

        $this->registerBaseServiceProviders();
        $this->registerCoreContainerAliases();
    }

    /**
     * @param  TemplateInterface  $template
     */
    public function setTemplate(TemplateInterface $template)
    {
        $this->template = $template;
    }

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->template->initialize();
    }

    /**
     * @param  string  $class
     * @param  Closure|null  $callback
     * @return $this|AdminInterface
     *
     * @throws Exceptions\RepositoryException
     * @throws BindingResolutionException
     */
    public function registerModel($class, Closure $callback = null)
    {
        $this->register($model = new ModelConfiguration($this->app, $class));

        if (is_callable($callback)) {
            call_user_func($callback, $model);
        }

        return $this;
    }

    /**
     * @param  ModelConfigurationInterface  $model
     * @return $this
     */
    public function register(ModelConfigurationInterface $model): AdminInterface
    {
        $this->setModel($model->getClass(), $model);

        if ($model instanceof Initializable) {
            try {
                $model->initialize();
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }

        return $this;
    }

    /**
     * @param  array  $sections
     * @return $this
     */
    public function registerSections(array $sections): AdminInterface
    {
        foreach ($sections as $model => $section) {
            if (class_exists($section)) {
                $this->register(new $section($this->app, $model));
            } else {
                $this->missedSections[$model] = $section;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getMissedSections(): array
    {
        return $this->missedSections;
    }

    /**
     * @param  string  $key
     * @param  ModelConfigurationInterface  $model
     * @return $this
     */
    public function setModel(string $key, ModelConfigurationInterface $model): AdminInterface
    {
        $this->models->put($key, $model);

        return $this;
    }

    /**
     * @param  string  $alias
     * @return mixed|null|ModelConfigurationInterface
     *
     * @throws Exceptions\RepositoryException
     * @throws BindingResolutionException
     */
    public function getModel($alias): ModelConfigurationInterface
    {
        if (is_object($alias)) {
            $alias = get_class($alias);
        }

        if (! $this->hasModel($alias)) {
            $this->registerModel($alias);
        }

        return $this->models->get($alias);
    }

    /**
     * @return ModelConfigurationInterface[]|ModelCollection
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * @param  string  $class
     * @return bool
     */
    public function hasModel(string $class): bool
    {
        return $this->models->has($class);
    }

    /**
     * @return NavigationInterface
     */
    public function navigation(): NavigationInterface
    {
        return $this->template()->navigation();
    }

    /**
     * @return MetaInterface
     */
    public function meta(): MetaInterface
    {
        return $this->template()->meta();
    }

    /**
     * @return TemplateInterface
     */
    public function template(): TemplateInterface
    {
        return $this->template;
    }

    /**
     * @param $class
     * @param  int  $priority
     * @return Navigation\Page
     *
     * @throws Exceptions\RepositoryException
     * @throws BindingResolutionException
     */
    public function addMenuPage($class = null, int $priority = 100): Navigation\Page
    {
        return $this->getModel($class)->addToNavigation($priority);
    }

    /**
     * @param  string|Renderable  $content
     * @param  string|null  $title
     * @return View|Factory
     */
    public function view($content, string $title = null)
    {
        return $this->app[AdminController::class]->renderContent($content, $title);
    }

    /**
     * Register all the base service providers.
     *
     * @return void
     */
    protected function registerBaseServiceProviders()
    {
        $providers = [
            AliasesServiceProvider::class,
            HtmlServiceProvider::class,
            BreadcrumbsServiceProvider::class,
            AdminServiceProvider::class,
        ];

        /* Workaround to allow use ServiceProvider-based configurations in old fashion */
        if (is_file(app_path('Providers/AdminSectionsServiceProvider.php'))) {
            $providers[] = $this->app->getNamespace().'Providers\\AdminSectionsServiceProvider';
        }

        $manifestPath = $this->app->bootstrapPath().'/cache/sleepingowladmin-services.php';

        (new ProviderRepository($this->app, new Filesystem(), $manifestPath))->load($providers);
    }

    /**
     * Register the core class aliases in the container.
     *
     * @return void
     */
    protected function registerCoreContainerAliases()
    {
        $aliases = [
            'sleeping_owl' => ['SleepingOwl\Admin\Admin', 'SleepingOwl\Admin\Contracts\AdminInterface'],
            'sleeping_owl.template' => ['SleepingOwl\Admin\Contracts\Template\TemplateInterface'],
            'sleeping_owl.breadcrumbs' => ['SleepingOwl\Admin\Contracts\Template\BreadcrumbsInterface'],
            'sleeping_owl.widgets' => ['SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface', 'SleepingOwl\Admin\Widgets\WidgetsRegistry'],
            'sleeping_owl.message' => ['SleepingOwl\Admin\Widgets\Messages\MessageStack'],
            'sleeping_owl.navigation' => ['SleepingOwl\Admin\Navigation', 'SleepingOwl\Admin\Contracts\Navigation\NavigationInterface'],
            'sleeping_owl.wysiwyg' => ['SleepingOwl\Admin\Wysiwyg\Manager', 'SleepingOwl\Admin\Contracts\Wysiwyg\WysiwygMangerInterface'],
            'sleeping_owl.meta' => ['assets.meta', 'SleepingOwl\Admin\Contracts\Template\MetaInterface', 'SleepingOwl\Admin\Templates\Meta'],
        ];

        foreach ($aliases as $key => $aliasesItem) {
            foreach ($aliasesItem as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }
}
