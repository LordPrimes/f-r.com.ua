<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'action';


    public function actions(){

        return $this->belongsTo('App\Model\Products', 'action_id');
    }
}
