<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class products extends Model
{   
    public function Comments()
    {
        return $this->hasOne('App\Model\Comments');
    }
 
}
