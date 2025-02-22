<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public  function __construct(
        protected OrderService $orderService
    ){}
    public function myOrders(){
        $orders = $this->orderService->myOrders();
        return view("User.Order.myOrders",compact("orders"));
    }
    public function show($id){
        $order_items = $this->orderService->show($id);
        return view("User.Order.order",compact("order_items"));

    }
    public function makeOrder(Request $request){
        $order = $this->orderService->makeOrder($request);
        // dd($order);
        return redirect(url(""))->with("Submitted",$order);
    }
}
