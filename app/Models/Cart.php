<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'price',
        'sale_price',
        'quantity',
        'unit',
        'product_id',
        'cart_product_id',
        'image',
    ];
}