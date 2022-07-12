<?php

namespace SleepingOwl\Admin\Navigation;

use Closure;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use SleepingOwl\Admin\Contracts\ModelConfigurationInterface;
use SleepingOwl\Admin\Contracts\Navigation\PageInterface;

class Page extends \KodiComponents\Navigation\Page implements PageInterface
{
    /**
     * Menu item related model class.
     *
     * @var string|null
     */
    protected ?string $model = null;

    /**
     * Menu item by url id.
     *
     * @var string|null
     */
    protected ?string $aliasId = null;

    /**
     * Menu item target attribute.
     *
     * @var string|null
     */
    protected ?string $target = null;

    /**
     * @param  string|null  $modelClass
     */
    public function __construct($modelClass = null)
    {
        parent::__construct();

        $this->setModel($modelClass);

        if ($this->hasModel()) {
            if ($this->getModelConfiguration()->getIcon()) {
                $this->setIcon($this->getModelConfiguration()->getIcon());
            }
        }
    }

    /**
     * Set Alias Id.
     */
    public function setAliasId()
    {
        $url = parse_url($this->getUrl(), PHP_URL_PATH);
        if ($url) {
            $this->aliasId = md5($url);
        }
    }

    /**
     * @return string|null
     */
    public function getAliasId(): ?string
    {
        return $this->aliasId;
    }

    /**
     * @return ModelConfigurationInterface|void
     */
    public function getModelConfiguration()
    {
        if (! $this->hasModel()) {
            return;
        }

        return app('sleeping_owl')->getModel($this->model);
    }

    /**
     * @return bool
     */
    public function hasModel(): bool
    {
        return ! is_null($this->model) && class_exists($this->model);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        if (is_null($this->id) && $this->hasModel()) {
            return $this->model;
        }

        return parent::getId();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        if (is_null($this->title) && $this->hasModel()) {
            return $this->getModelConfiguration()->getTitle();
        }

        return parent::getTitle();
    }

    /**
     * Set Target.
     *
     * @param $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return string|null
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        if (is_null($this->url) && $this->hasModel()) {
            return $this->getModelConfiguration()->getDisplayUrl();
        }

        return parent::getUrl();
    }

    /**
     * @return Closure|bool
     */
    public function getAccessLogic()
    {
        if (! is_callable($this->accessLogic)) {
            if ($this->hasModel()) {
                return function () {
                    return $this->getModelConfiguration()->isDisplayable();
                };
            }
        }

        return parent::getAccessLogic();
    }

    /**
     * @param  string|null  $view
     * @return Factory|View|string
     */
    public function render($view = null): Factory|View|string
    {
        if ($this->hasChild() && ! $this->hasClassProperty($class = config('navigation.class.has_child', 'treeview'))) {
            $this->setHtmlAttribute('class', $class);
        }

        if ($this->getTarget()) {
            $this->setHtmlAttribute('target', $this->getTarget());
        }

        $data = $this->toArray();

        if (! is_null($view)) {
            return view($view, $data)->render();
        }

        return app('sleeping_owl.template')->view('_partials.navigation.page', $data)->render();
    }

    /**
     * @param string|null $model
     * @return $this
     */
    protected function setModel(?string $model): self
    {
        if ($model) {
            $this->model = $model;
        }

        return $this;
    }
}
