<?php

namespace App\Http\Controllers\Shop\ShoppingCartPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\shop\Products;


class ShoppingCartController extends BaseController
{
    public function addcart(Request $request){

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.show')->with('success_message', 'Вы, уже добавляли этот товар в корзину!');
        }

        Cart::add($request->id, $request->name, $request->qty, $request->price)
        ->associate('App\Model\shop\Products');
        return redirect()->route('cart.show')->with('success_message', 'Товар успешно добавлен корзину!');
    }
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'Товар успешно удален!');
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, $request->quantity);
       
       return back()->with('success_message', 'Товар успешно изменен!');
    }

 

    public function show(){

       return view('site.pages.cart');
    }
}
