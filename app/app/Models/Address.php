<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    const ADDRESS1 = 'address_1';
    const ADDRESS2 = 'address_2';
    const CITY = 'city';
    const POST_CODE = 'post_code';
    const COUNTRY = 'country';
    const STATE = 'state';

    protected $fillable = [
        self::ADDRESS1,
        self::ADDRESS2,
        self::CITY,
        self::POST_CODE,
        self::COUNTRY,
        self::STATE
    ];
}
