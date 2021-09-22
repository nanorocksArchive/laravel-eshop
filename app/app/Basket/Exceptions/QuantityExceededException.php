<?php

namespace App\Basket\Exceptions;

class QuantityExceededException extends \Exception
{
    protected $message = 'You have maximum stock for this item';
}
