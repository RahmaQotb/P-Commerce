<?php
namespace App\Repositories\Admin\Order;
use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository implements OrderRepositoryInterface{
    public function index(){
        return Order::all();
    }
    public function show($id){
        return OrderItem::where("order_id",$id)->get();
    }    
}