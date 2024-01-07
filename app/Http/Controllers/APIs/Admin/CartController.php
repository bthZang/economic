<?php

namespace App\Http\Controllers\APIs\Admin;

use App\Http\Controllers\APIs\BaseController;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Services\Interfaces\ImageServiceInterface as ImageService;
use App\Services\Interfaces\CartServiceInterface as CartService;
use Exception;
use Illuminate\Http\JsonResponse;

class CartController extends BaseController
{
    protected CartService $cartService;
    protected ImageService $imageService;

    public function __construct(CartService $cartService, ImageService $imageService)
    {
        $this->cartService = $cartService;
        $this->imageService = $imageService;
    }

    public function index(): JsonResponse
    {
        try {
            $cart = $this->cartService->paginate(['*'], [], 10, [], ['id', 'DESC'], []);
            return $this->withSuccess($cart);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function store(CartRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $cart = $this->cartService->create($validatedData);

            if (isset($validatedData['images'])) {
                $this->imageService->uploadMultipleImages($cart, $validatedData['images']);
            }

            return $this->withSuccess($cart);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function update(string|int $id, CartRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $cart = $this->cartService->update($id, $validatedData);
            return $this->withSuccess($cart);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function delete(string|int $id): JsonResponse
    {
        try {
            $cart = $this->cartService->delete($id);
            return $this->withSuccess($cart);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }
}