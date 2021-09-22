<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'orders_products';

    const ORDER_ID = 'order_id';
    const PRODUCT_ID = 'product_id';
    const QUANTITY = 'quantity';

    protected $fillable = [
        self::ORDER_ID,
        self::PRODUCT_ID,
        self::QUANTITY
    ];
}
