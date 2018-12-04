<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog_Recommend extends Model
{

    protected $table = 'blogrecommend';

    public function blogrecommends(){
        
        return $this->hasMany('App\Model\Blog', 'blogrecommend_id');
    }
    
    public function scopeRecommend($query, $seo_url){
        
        return $query->where('url', $seo_url)->take(4)->inRandomOrder();
    }
}
