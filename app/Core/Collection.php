<?php

namespace app\Core;

use Iterator;
use Countable;

class Collection implements Iterator, Countable
{
    private $items = [];
    private $position;

    public function __construct()
    {
        $this->position = 0;
    }

    public function add($item)
    {
        array_push($this->items, $item);
    }

    function rewind()
    {
        $this->position = 0;
    }

    function current()
    {
        return $this->items[$this->position];
    }

    function key()
    {
        return $this->position;
    }

    function next()
    {
        $this->position++;
    }

    function valid()
    {
        return isset($this->items[$this->position]);
    }

    function count()
    {
        return count($this->items);
    }
}