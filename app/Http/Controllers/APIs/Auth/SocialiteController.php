<?php

namespace App\Http\Controllers\APIs\Auth;

use App\Http\Controllers\APIs\BaseController;
use App\Services\Interfaces\SocialiteServiceInterface as SocialiteService;
use Exception;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Http\Requests\SocialiteRequest;
use App\Http\Requests\UserRequest;

// use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends BaseController
{
    protected UserService $userService;
    // protected SocialiteService $socialiteService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        // $this->socialiteService = $socialiteService;
    }

    public function store(SocialiteRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $user = $this->userService->create($validatedData);
            return $this->withSuccess($user);
        } catch (Exception $exception) {
            return $this->withError($exception->getMessage());
        }
    }

    //    public function authUser(Request $request): JsonResponse
    // {
    //     try {
    //         $user = $request->user();
    //         return $this->withSuccess($user);
    //     } catch (Exception $exception) {
    //         return $this->withError($exception->getMessage());
    //     }
    // }
}