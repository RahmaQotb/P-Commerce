<?php
namespace App\Repositories\User\Order;

interface OrderRepositoryInterface{
    public function myOrders();
    public function show($id);
    public function makeOrder($data);
}