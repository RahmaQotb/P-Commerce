<?php

namespace App\Services\User\Order;
use App\Repositories\User\Order\OrderRepositoryInterface;

class OrderService{
    public  function __construct(
        protected OrderRepositoryInterface $orderRepositoryInterface
    ){}
    public function myOrders(){
        return $this->orderRepositoryInterface->myOrders();
    }
    public function show($id){
        return $this->orderRepositoryInterface->show($id);
    }
    public function makeOrder($data){
        return $this->orderRepositoryInterface->makeOrder($data);
    }
}