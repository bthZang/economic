<?php

namespace App\Http\Controllers\APIs\Auth;

use App\Models\User;
use App\Http\Controllers\APIs\BaseController;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\UserRequest;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends BaseController
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(AuthenticationRequest $request): JsonResponse
    {
        try {
            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                return $this->withError(['Invalid credentials']);
            }
            $user = User::where('email', $request->email)->firstOrFail();
            return $this->withSuccess($user);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

}