<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\BaseService;

use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\BaseServiceInterface;

use App\Services\Interfaces\ImageServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\CartProductServiceInterface;
use App\Services\Interfaces\CartServiceInterface;
use App\Services\Interfaces\SocialiteServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\ProductService;
use App\Services\CartService;
use App\Services\CartProductService;
use App\Services\SocialiteService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(SocialiteServiceInterface::class, SocialiteService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(ImageServiceInterface::class, ImageService::class);
        $this->app->bind(BaseServiceInterface::class, BaseService::class);
        $this->app->bind(CartProductServiceInterface::class, CartProductService::class);
        $this->app->bind(CartServiceInterface::class, CartService::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    public function boot(): void
    {
        //
    }
}