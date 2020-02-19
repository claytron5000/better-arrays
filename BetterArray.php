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

    public function return() : Array
    {
        return $this->arr;
    }

    /**
     * Other possible methods:
     * 
     * array_​change_​key_​case
     * array_​chunk
     * array_​column
     * array_​combine
     * array_​count_​values
     * array_​diff_​assoc
     * array_​diff_​key
     * array_​diff_​uassoc
     * array_​diff_​ukey
     * array_​diff
     * array_​fill_​keys
     * array_​fill
     * array_​filter
     * array_​flip
     * array_​intersect_​assoc
     * array_​intersect_​key
     * array_​intersect_​uassoc
     * array_​intersect_​ukey
     * array_​intersect
     * array_​key_​exists
     * array_​key_​first
     * array_​key_​last
     * array_​keys
     * array_​map
     * array_​merge_​recursive
     * array_​merge
     * array_​multisort
     * array_​pad
     * array_​pop
     * array_​product
     * array_​push
     * array_​rand
     * array_​reduce
     * array_​replace_​recursive
     * array_​replace
     * array_​reverse
     * array_​search
     * array_​shift
     * array_​slice
     * array_​splice
     * array_​sum
     * array_​udiff_​assoc
     * array_​udiff_​uassoc
     * array_​udiff
     * array_​uintersect_​assoc
     * array_​uintersect_​uassoc
     * array_​uintersect
     * array_​unique
     * array_​unshift
     * array_​values
     * array_​walk_​recursive
     * array_​walk
     * array
     * arsort
     * asort
     * compact
     * count
     * current
     * end
     * extract
     * in_​array
     * key_​exists
     * key
     * krsort
     * ksort
     * list
     * natcasesort
     * natsort
     * next
     * pos
     * prev
     * range
     * reset
     * rsort
     * shuffle
     * sizeof
     * sort
     * uasort
     * uksort
     * usort
     */

}