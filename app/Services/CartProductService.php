<?php

namespace App\Services;

use App\Repositories\Interfaces\CartProductRepositoryInterface as CartProductRepository;
use App\Services\Interfaces\CartProductServiceInterface;

class CartProductService extends BaseService implements CartProductServiceInterface
{
    protected CartProductRepository $cartProductRepository;

    public function __construct(CartProductRepository $cartProductRepository)
    {
        parent::__construct($cartProductRepository);
        $this->cartProductRepository = $cartProductRepository;
    }
}