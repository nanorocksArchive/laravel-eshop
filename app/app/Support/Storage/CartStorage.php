<?php

namespace App\Support\Storage;

class CartStorage
{
    protected static string $basket = 'cart';

    public static function init()
    {
        if (!isset($_SESSION[self::$basket])) {
            $_SESSION[self::$basket] = [];
        }
    }

    public static function get($index)
    {
        return self::exist($index) ? $_SESSION[self::$basket][$index] : null;
    }

    public static function set($index, $value)
    {
        $_SESSION[self::$basket][$index] = $value;
    }

    public static function all()
    {
        return $_SESSION[self::$basket];
    }

    public static function exist($index): bool
    {
        return isset($_SESSION[self::$basket][$index]);
    }

    public static function unset($index)
    {
        if (self::exist($index)) {
            unset($_SESSION[self::$basket][$index]);
        }
    }

    public static function clear()
    {
        $_SESSION[self::$basket] = [];
    }

    public static function count(): int
    {
        return count(self::all());
    }
}
