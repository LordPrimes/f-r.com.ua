<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
protected $table = 'Comments';

protected $fillable = array('id','name', 'description', 'bad_comments', 'good_comments', 'visable', 'products_id');

    public function Products()
    {
        return $this->belongsTo('App\Model\shop\Products');
    }

  

    public function scopeVisableComments($query, $prod_id){

        return $query->where('visable', 1)->where('products_id', $prod_id)->orderBy('id', 'desc');
    }
}
