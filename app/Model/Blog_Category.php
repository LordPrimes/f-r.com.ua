<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog_Category extends Model
{
    protected $table = 'blogcategory';

    public function blogs()
    {
        return $this->hasMany('App\Model\Blog', 'blogcategory_id');
    }
    
    public function getRouteKeyName(){
        return 'slug';
    }
}
