<?php

namespace App\Services;

use App\Repositories\Interfaces\CartRepositoryInterface as CartRepository;
use App\Services\Interfaces\CartServiceInterface;

class CartService extends BaseService implements CartServiceInterface
{
    protected CartRepository $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        parent::__construct($cartRepository);
        $this->cartRepository = $cartRepository;
    }
}