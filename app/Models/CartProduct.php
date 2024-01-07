<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CartProduct extends Model
{
    protected $table = 'cart_product';

    protected $fillable = [
        'price',
        'sale_price',
        'quantity',
        'unit',
        'product_id',
        'image',
    ];
}