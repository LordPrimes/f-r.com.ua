<?php

namespace App\Model\Blogs;

use Illuminate\Database\Eloquent\Model;

class Blog_Category extends Model
{
    protected $table = 'blogcategory';

    public function blogs()
    {
        return $this->hasMany('App\Model\Blogs\Blog', 'blogcategory_id');
    }
    
    public function getRouteKeyName(){
        return 'slug';
    }
}
