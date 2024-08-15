<?php

namespace App\Providers;

use App\Repositories\Admin\category\CategoryRepository;
use App\Repositories\Admin\category\CategoryRepositoryInterface;
use App\services\Admin\Category\categoryService as AdminCategoryService;

use App\Repositories\Admin\Product\ProductRepository;
use App\Repositories\Admin\Product\ProductRepositoryInterface;
use App\services\Admin\product\ProductService as AdminProductService;

use App\Repositories\User\Order\OrderRepository;
use App\Repositories\User\Order\OrderRepositoryInterface;
use App\Services\User\Order\OrderService;

use App\Repositories\User\Product\UserProductRepository;
use App\Repositories\User\Product\UserProductRepositoryInterface;
use App\Services\User\product\UserProductService;
////////////////////////////////////////////////


use App\Repositories\Admin\Order\OrderRepository as AdminOrderRepository;
use App\Repositories\Admin\Order\OrderRepositoryInterface as AdminOrderRepositoryInterface;
use App\services\Admin\Order\OrderService as AdminOrderService;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);
        $this->app->bind(OrderService::class,function($app){
            return new OrderService($app->make(OrderRepositoryInterface::class));
        });
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(AdminProductService::class, function ($app) {
            return new AdminProductService($app->make(ProductRepositoryInterface::class));
        });
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(AdminCategoryService::class, function ($app) {
            return new AdminCategoryService($app->make(CategoryRepositoryInterface::class));
        });
        $this->app->bind(UserProductRepositoryInterface::class, UserProductRepository::class);
        $this->app->bind(UserProductService::class, function ($app) {
            return new UserProductService($app->make(UserProductRepositoryInterface::class));
        });
        $this->app->bind(AdminOrderRepositoryInterface::class, AdminOrderRepository::class);
        $this->app->bind(AdminOrderService::class, function ($app) {
            return new AdminOrderService($app->make(AdminOrderRepositoryInterface::class));
        });
    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
