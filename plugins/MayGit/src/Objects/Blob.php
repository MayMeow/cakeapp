<?php

namespace MayMeow\Git\Objects;

class Blob {

    public $name;

    public $hash;

    public $type = 'file';

    public $size;

    public function __construct($name, $hash, $size)
    {
        $this->name = $name;
        $this->hash = $hash;
        $this->size = $size;
    }
}