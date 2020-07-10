<?php

function betterArray(array $arr) {
    return new BetterArrays($arr);
}

/**
 * 
 * @todo enable key/value processing in filter, and multi-array in reduce
 * @todo make the static method a stand-alone method
 */
class BetterArrays {

    protected $arr;

    protected $variables;

    public static function funcify(array $arr)
    {
        return new BetterArray($arr);
    }

    function __construct (Array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * ending functions
     */

    public function returnArray() : Array
    {
        return $this->arr;
    }

    public function pop(): mixed
    {
        return array_pop($this->arr);
    }

    public function product(): number
    {
        return array_product($this->arr);
    }

    public function shift(): mixed
    {
        return array_shift($this->arr);
    }

    public function sum(): number
    {
        return array_sum($this->arr);
    }

    public function count(): int
    {
        return count($this->arr);
    }

    public function in_array(mixed $needle, bool $strict = FALSE): boolean
    {
        return in_array($needle, $this->arr, $strict);
    }

    

    /**
     * callback functions
     */

    public function map(callable $func) : self
    {
        $this->arr = array_map($func, $this->arr);
        return $this;
    }

    public function filter(callable $func, int $flag = 0) : self
    {
        $this->arr = $func !== NULL ? array_filter($this->arr, $func, $flag) : array_filter($this->arr);
        return $this;
    }

    public function reduce(callable $func, $initial) : self
    {
        $this->arr = array_reduce($this->arr, $func, $initial);
        return $this;
    }

    /**
     * utility functions
     */
    public function change_key_case(int $case = CASE_LOWER) : self
    {
        $this->arr = array_change_key_case($this->arr, $case);
        return $this;
    }

    public function chunk(int $size, bool $preserve_keys = FALSE) : self
    {
        $this->arr = array_chunk($this->arr, $size, $preserve_keys);
        return $this;
    }

    public function column(mixed $column_key, mixed $index_key = NULL) : self
    {
        $this->arr = array_column($this->arr, $column_key, $index_key);
        return $this;
    }

    public function count_values() : self
    {
        $this->arr = array_count_values($this->arr);
        return $this;
    }

     public function fill_keys(mixed $value) : self
     {
         $this->arr = array_fill_keys($this->arr, $value);
         return $this;
     }

    public function flip() : self
    {
        $this->arr = array_flip($this->arr);
        return $this;
    }

    public function keys( mixed $search_value = NULL, bool $strict = FALSE ) : self
    {
        $this->arr = $search_value !== NULL ? array_keys($this->arr) : array_keys($this->arr, $search_value, $strict);
        return $this;
    }

    public function pad(int $size , mixed $value) : self
    {
        $this->arr = array_pad($this->arr, $size, $value);
        return $this;
    }

    public function reverse( bool $preserve_keys = FALSE): self
    {
        $this->arr = array_reverse($this->arr, $preserve_keys);
        return $this;
    }

    public function slice(int $offset , int $length = NULL , bool $preserve_keys = FALSE ): self
    {
        $this->arr = array_slice($this->arr, $offset, $length, $preserve_keys);
        return $this;
    }

    public function unique(int $sort_flags = SORT_STRING): self
    {
        $this->arr = array_unique($this->arr, $sort_flags);
        return $this;
    }

    public function unshift(...$args): self
    {
        $this->arr = array_unshift($this->arr, ...$args);
        return $this;
    }

    public function values(): self
    {
        $this->arr = array_values($this->arr);
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