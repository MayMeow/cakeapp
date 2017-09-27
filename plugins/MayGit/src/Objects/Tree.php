<?php

namespace MayMeow\Git\Objects;

class Tree {

    public $name;

    public $hash;

    public $type = 'folder';

    public $size;

    public function __construct($name, $hash)
    {
        $this->name = $name;
        $this->hash = $hash;
    }
}