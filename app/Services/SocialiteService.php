<?php

namespace App\Services;

use App\Repositories\Interfaces\SocialiteRepositoryInterface as SocialiteRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Services\Interfaces\SocialiteServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteService extends BaseService implements SocialiteServiceInterface
{
    protected UserRepository $userRepository;
    protected SocialiteRepository $socialiteRepository;

    public function __construct(
        UserRepository $userRepository,
        SocialiteRepository $socialiteRepository
    ) {
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
        $this->socialiteRepository = $socialiteRepository;
    }
}