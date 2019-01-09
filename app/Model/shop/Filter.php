<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $table = 'filter';

    protected $fillable = array('id', 'name', 'slug', 'parent_id');


    public function filters(){

        return $this->belongsToMany('App\Model\shop\Products','filter_products','filter_id', 'products_id');
    }

}
