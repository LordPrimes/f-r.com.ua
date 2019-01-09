<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Filter_Products extends Model
{
    protected $table = 'filter_products';

    protected $fillable = ['filter_id','products_id','name'];

   public function filters(){

    return $this->hasOne('App\Model\shop\Products','id','products_id');
   }
}
