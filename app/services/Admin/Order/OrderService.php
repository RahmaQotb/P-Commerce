<?php

namespace App\Services\Admin\Order;
use App\Repositories\Admin\Order\OrderRepositoryInterface;

class OrderService{
    public function __construct(
        protected OrderRepositoryInterface $orderRepositoryInterface
    ){}

    public function index(){
        return $this->orderRepositoryInterface->index();
    }
    public function show($id){
        return $this->orderRepositoryInterface->show($id);
    }
}