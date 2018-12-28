<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'action';


    public function actions(){

        return $this->belongsTo('App\Model\shop\Products', 'action_id');
    }
    
    public function scopeAction($query){

        return $query->inRandomOrder()->take(4);
    }
}
