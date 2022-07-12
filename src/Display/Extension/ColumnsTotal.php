<?php

namespace SleepingOwl\Admin\Display\Extension;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use KodiComponents\Support\HtmlAttributes;
use SleepingOwl\Admin\Contracts\Display\Placable;
use SleepingOwl\Admin\Display\Element;
use SleepingOwl\Admin\Traits\ElementPlacementTrait;
use SleepingOwl\Admin\Traits\ElementViewTrait;

class ColumnsTotal extends Extension implements Placable
{
    use HtmlAttributes, ElementPlacementTrait, ElementViewTrait;

    /**
     * @var string|View
     */
    protected $view = 'display.extensions.columns_total';

    /**
     * @var string
     */
    protected $placement = 'table.header';

    /**
     * @var string
     */
    protected $tag = 'thead';

    /**
     * @var Collection
     */
    protected $elements;

    public function __construct()
    {
        $this->elements = new Collection();
    }

    /**
     * @return null|string
     */
    public function getPlacement(): ?string
    {
        return $this->placement;
    }

    public function set(array $elements, $columnsNumber = 0): ColumnsTotal
    {
        array_map(function ($element) {
            if (! is_object($element)) {
                $element = Element::create($element);
            }
            $this->elements->push($element);
        },
            array_pad($elements, max($columnsNumber, count($elements)), '')
        );

        return $this;
    }

    public function toArray(): array
    {
        $this->setHtmlAttribute('class', 'table-hover');

        return [
            'elements' => $this->elements,
            'attributes' => $this->htmlAttributesToString(),
            'tag' => $this->getTag(),
        ];
    }
}
