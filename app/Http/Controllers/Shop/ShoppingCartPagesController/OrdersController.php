<?php

namespace App\Http\Controllers\Shop\ShoppingCartPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Orders;
use App\Http\Requests\OrdersRequest;
class OrdersController extends Controller
{
    public function index(OrdersRequest $request){

        $validated = $request->validated();
    }
}
