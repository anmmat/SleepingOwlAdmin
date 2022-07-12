<?php

namespace SleepingOwl\Admin\Display\Extension;

use Illuminate\View\View;
use KodiComponents\Support\HtmlAttributes;
use SleepingOwl\Admin\Contracts\Display\Placable;

class Links extends Extension implements Placable
{
    use HtmlAttributes;

    /**
     * @var string|View
     */
    protected $view = 'display.extensions.links';

    /**
     * @var string
     */
    protected $placement = 'before.card';

    /**
     * @var array
     */
    protected $links = [];

    public function __construct()
    {
        $this->setHtmlAttribute('class', 'links-row');
    }

    /**
     * @param  array  $links
     * @return Links
     */
    public function set(array $links): Links
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @return View|string
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param $view
     * @return $this
     */
    public function setView($view): Links
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPlacement(): ?string
    {
        return $this->placement;
    }

    /**
     * @param $placement
     * @return $this
     */
    public function setPlacement($placement): Links
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param  array  $links
     * @return $this
     */
    public function setLinks(array $links): Links
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @param  $link
     * @param  null  $key
     * @return $this
     */
    public function add($link, $key = null): Links
    {
        if ($key !== null) {
            $this->links[$key] = $link;
        } else {
            $this->links[] = $link;
        }

        return $this;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return @$this->links[$key] ?: null;
    }

    /**
     * @param $key
     * @return $this
     */
    public function remove($key): Links
    {
        unset($this->links[$key]);

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'links' => $this->getLinks(),
            'attributes' => $this->htmlAttributesToString(),
        ];
    }
}
