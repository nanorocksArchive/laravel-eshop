<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    const ORDER_ID = 'order_id';
    const FAILED = 'failed';
    const TRANSACTION_ID = 'transaction_id';

    protected $fillable = [
        self::ORDER_ID,
        self::FAILED,
        self::TRANSACTION_ID
    ];

}
