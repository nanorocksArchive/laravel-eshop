<?php

namespace App\Support\Storage\Contracts;

interface IStorage
{
    public function get($index);

    public function set($index, $value);

    public function all();

    public function exist($index);

    public function unset($index);

    public function clear();
}
