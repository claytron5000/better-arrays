<?php

function betterArray(array $arr) {
    return new BetterArray($arr);
}

/**
 * 
 * @todo enable key/value processing in filter, and multi-array in reduce
 * @todo make the static method a stand-alone method
 */
class BetterArray {

    protected $arr;

    protected $variables;

    public static function funcify(array $arr, array $variables = null)
    {
        return new BetterArray($arr);
    }

    function __construct (Array $arr)
    {
        $this->arr = $arr;
    }

    public function map($func) : self
    {
        $this->arr = array_map($func, $this->arr);
        return $this;
    }

    public function filter($func) : self
    {
        $this->arr = array_filter($this->arr, $func);
        return $this;
    }

    public function reduce($func, $initial) : self
    {
        $this->arr = array_reduce($this->arr, $func, $initial);
        return $this;
    }

    public function end() : Array
    {
        return $this->arr;
    }

}