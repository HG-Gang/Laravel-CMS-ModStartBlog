<?php


namespace ModStart\Grid\Filter;


class Has extends AbstractFilter
{
    protected $query = 'whereIn';

    
    public function condition($searchInfo)
    {
        if (isset($searchInfo['has']) && is_array($searchInfo['has'])) {
            return $this->buildCondition($this->column, $searchInfo['has']);
        }
        return null;
    }

    
    public function checkbox($options)
    {
        $this->field = new Field\Checkbox($this);
        $this->field->options($options);
        return $this;
    }

    public function cascader($options)
    {
        $this->field = new Field\Cascader($this);
        $this->field->nodes($options);
        return $this;
    }
}
