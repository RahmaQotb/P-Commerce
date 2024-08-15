<?php
namespace App\Repositories\Admin\Order;

interface OrderRepositoryInterface{
    public function index();
    public function show($id);
}