<?php

namespace App\Repositories;

use App\Models\CartProduct;
use App\Repositories\Interfaces\CartProductRepositoryInterface;

class CartProductRepository extends BaseRepository implements CartProductRepositoryInterface
{
    public function __construct(CartProduct $cartProduct)
    {
        parent::__construct($cartProduct);
    }
}