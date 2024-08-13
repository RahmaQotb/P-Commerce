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

    public function makeOrder(Request $request){
        $this->orderService->makeOrder($request);
        return redirect(url(""))->with("success","Your Order has been submitted");
    }
}
