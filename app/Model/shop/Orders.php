<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = ['name', 'phone', 'email','addres','status'];



    public function ordercart(){

        return $this->belongsToMany('App\Model\shop\Products')->withPivot('qty');
    }
}
