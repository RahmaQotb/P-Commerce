<?php

namespace App\Providers;

use App\Repositories\User\Order\OrderRepository;
use App\Repositories\User\Order\OrderRepositoryInterface;
use App\Services\User\Order\OrderService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
