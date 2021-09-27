<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $quantity = null;

    protected $table = 'products';

    const TITLE = 'title';
    const SLUG = 'slug';
    const DESCRIPTION = 'description';
    const PRICE = 'price';
    const IMAGE = 'image';
    const STOCK = 'stock';
    const ADDITIONAL = 'additional'; // array with json for color and size

    public function order()
    {
        return $this->belongsToMany(Order::class, 'orders_products')->withPivot('quantity');
    }

    public function hasStock(int $quantity): bool
    {
        return $this->stock >= $quantity;
    }

    public function hasLowerStock(): bool
    {
        return !$this->outOfStock() && $this->stock <= 3;
    }

    public function outOfStock(): bool
    {
        return $this->stock === 0;
    }

    public function inStock(): bool
    {
        return $this->stock >= 1;
    }

    public function productImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class, ProductImage::PRODUCT_ID, 'id');
    }

}
