<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    const TITLE = 'title';
    const SLUG = 'slug';
    const DESCRIPTION = 'description';
    const PRICE = 'price';
    const IMAGE = 'image';
    const STOCK = 'stock';
    const ADDITIONAL = 'additional'; // array with json for color and size

}
