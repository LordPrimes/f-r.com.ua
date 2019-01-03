<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Order_Products extends Model
{
    protected $table = 'orders_products';

    protected $fillable = ['order_id','products_id','qty'];
}
