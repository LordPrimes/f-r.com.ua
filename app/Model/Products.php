<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class products extends Model

{   
   

    public function comments()
    {
        return $this->hasOne('App\Model\Comments');
    }
 

   
}
