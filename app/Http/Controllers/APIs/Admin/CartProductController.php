<?php

namespace App\Http\Controllers\APIs\Admin;

use App\Http\Controllers\APIs\BaseController;
use App\Http\Requests\CartProductRequest;
use App\Models\CartProduct;
use App\Services\Interfaces\ImageServiceInterface as ImageService;
use App\Services\Interfaces\CartProductServiceInterface as CartProductService;
use Exception;
use Illuminate\Http\JsonResponse;

class CartProductController extends BaseController
{
    protected CartProductService $cartProductService;
    protected ImageService $imageService;

    public function __construct(CartProductService $cartProductService, ImageService $imageService)
    {
        $this->cartProductService = $cartProductService;
        $this->imageService = $imageService;
    }

    public function index(): JsonResponse
    {
        try {
            $cartProducts = $this->cartProductService->paginate(['*'], [], 10, [], ['id', 'DESC'], []);
            return $this->withSuccess($cartProducts);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function store(CartProductRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $cartProduct = $this->cartProductService->create($validatedData);

            if (isset($validatedData['images'])) {
                $this->imageService->uploadMultipleImages($cartProduct, $validatedData['images']);
            }

            return $this->withSuccess($cartProduct);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function update(string|int $id, CartProductRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $cartProduct = $this->cartProductService->update($id, $validatedData);
            return $this->withSuccess($cartProduct);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function delete(string|int $id): JsonResponse
    {
        try {
            $cartProduct = $this->cartProductService->delete($id);
            return $this->withSuccess($cartProduct);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }
}