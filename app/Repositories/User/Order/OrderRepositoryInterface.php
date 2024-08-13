<?php
namespace App\Repositories\User\Order;

interface OrderRepositoryInterface{
    public function makeOrder($data);
}