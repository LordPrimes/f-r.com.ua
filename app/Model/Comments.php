<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
   
    public function Products()
    {
        return $this->belongsTo('App\Model\Products');
    }


}
