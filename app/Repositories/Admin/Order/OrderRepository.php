<?php
namespace App\Repositories\Admin\Order;
use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository implements OrderRepositoryInterface{
    public function index(){
        return OrderItem::all();
    }
    public function show($id){
        return OrderItem::find($id);
    }    
}