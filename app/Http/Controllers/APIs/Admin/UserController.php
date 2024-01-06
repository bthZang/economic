<?php

namespace App\Http\Controllers\APIs\Admin;

use App\Models\User;
use App\Http\Controllers\APIs\BaseController;
use App\Http\Requests\UserRequest;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Exception;
use Illuminate\Http\JsonResponse;

class UserController extends BaseController
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        try {
            $user = $this->userService->paginate(['*'], [], 10, [], ['id', 'DESC'], []);
            return $this->withSuccess($user);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function store(UserRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $user = $this->userService->create($validatedData);
            return $this->withSuccess($user);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function update(UserRequest $request, string|int $id): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $user = $this->userService->update($id, $validatedData);
            return $this->withSuccess($user);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    public function delete(string|int $id): JsonResponse
    {
        try {
            $user = $this->userService->delete($id);
            return $this->withSuccess($user);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }
}
