<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='Categories';


    public function products()
    {
        return $this->hasMany('App\Model\shop\Products', 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
