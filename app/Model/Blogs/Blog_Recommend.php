<?php

namespace App\Model\Blogs;

use Illuminate\Database\Eloquent\Model;

class Blog_Recommend extends Model
{

    protected $table = 'blogrecommend';

    public function blogrecommends(){
        
        return $this->belongsTo('App\Model\Blogs\Blog', 'recommend_id');
    }
    
    
    public function scopeRecommend($query, $seo_url){

        return $query->where('seo_url', $seo_url);
    }
}
