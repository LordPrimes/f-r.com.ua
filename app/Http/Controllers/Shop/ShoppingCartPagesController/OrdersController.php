<?php

namespace App\Http\Controllers\Shop\ShoppingCartPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Orders;
use App\Http\Requests\OrdersRequest;
use App\Model\shop\Order_Products as OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersController extends BaseController
{
    public function index(OrdersRequest $request){

        $validated = $request->validated();

        $order = Orders::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'addres' => $request->input('adres'),
            'status' => 0, 
            ]);
           

            foreach(Cart::content() as $item){
                OrderProduct::create([
                    'orders_id' => $order->id,
                    'products_id' => $item->model->id,
                    'qty' => $item->qty
                ]);
            }

            session()->flash('goods', 'Ваше заказ добавлен на обработку');
            return back()->withInput(); 
            
    }
}
