<?php

namespace Sunnysideup\HierarchicalListField;

use SilverStripe\Forms\LiteralField;

class HierarchicalListField extends LiteralField
{

    protected array $array = [];

    /**
     * @param string $name
     * @param array $array
     */
    public function __construct(?string $name, array $array)
    {
        parent::__construct($name, '');
        $this->setArray($array);
    }

    public function setArray($array): static
    {
        $this->array = $array;
        $this->setContent($this->constructHTML());
        return $this;
    }

    public function getArray($array): array
    {
        return $this->array;
    }

    public function constructHtml()
    {
        return '<div class="hierarchical-list-field field">'.$this->constructHtmlInner($this->array).'</div>';
    }

    public function constructHtmlInner($array)
    {
        $html = '<ul>';

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $html .= '<li class="expandable">';
                $html .= '<div>';
                $html .= '<span title="click to open / close" class="expandable-arrow" onclick="HierarchicalListFieldExpand(this)">&#9654;</span> ';
                $html .= (is_numeric($key) ? '' : $this->createKeyHtml($key));
                $html .= '</div>';
                $html .= $this->constructHtmlInner($value);
                $html .= '</li>';
            } else {
                $html .= '<li>';
                $html .= '<div>';
                $html .= is_numeric($key) ? $this->createValueHtml($value) : $this->createKeyHtml($key). ': ' . $this->createValueHtml($value) ;
                $html .= '</div>';
                $html .= '</li>';            }
        }

        $html .= '</ul>';

        return $html;
    }


    /**
     * @param array $properties
     *
     * @return string
     */
    public function Field($properties = [])
    {
        $this->setContent($this->constructHtml($this->array));
        return parent::Field($properties);
    }

    protected function createKeyHtml(string $key) : string
    {
        return '<strong>'.$key.'</strong>';
    }

    protected function createValueHtml(string $value) : string
    {
        return '<span>'.$value.'</span>';
    }

}
