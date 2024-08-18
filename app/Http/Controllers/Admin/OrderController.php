<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService $orderService
    ){}
    public function index(){
        $orders = $this->orderService->index();
        return view("Admin.Orders.AllOrders",compact("orders"));
    }
    public function show($id){
        $orders = $this->orderService->show($id);
        return view("Admin.Orders.showOrder",compact("orders"));
    }
}