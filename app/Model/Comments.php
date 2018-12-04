<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
   
    protected $fillable = array('id','name', 'description', 'bad_comments', 'good_comments', 'visable', 'products_id');

    public function Products()
    {
        return $this->belongsTo('App\Model\Products');
    }

    public function scopeOrderidDesc($query)
    {

        return $query->orderBy('id', 'DESC');
    }
    
    public function scopeVisable($query){
        
        return $query->where('visable', 1);
    }
}
