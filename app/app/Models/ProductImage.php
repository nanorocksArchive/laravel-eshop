<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table='products_images';

    const ID = 'id';
    const PRODUCT_ID = 'product_id';
    const IMAGE = 'image';

}
