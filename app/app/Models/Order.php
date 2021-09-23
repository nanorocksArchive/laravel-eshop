<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    const ID = 'id';
    const HASH = 'hash';
    const TOTAL = 'total';
    const PAID = 'paid';
    const ADDRESS_ID = 'address_id';
    const CUSTOMER_ID = 'customer_id';
    const COMMENT = 'comment';

    protected $fillable = [
        self::HASH,
        self::TOTAL,
        self::PAID,
        self::CUSTOMER_ID,
        self::ADDRESS_ID,
        self::COMMENT
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity');
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
