<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='Categories';

    protected $fillable = array('id','name', 'slug', 'parent_id');


    public function products()
    {
        return $this->hasMany('App\Model\shop\Products', 'category_id');
    }

   public function subcategory(){

    return $this->hasMany('App\Model\shop\Category', 'parent_id');
   }
}
