<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blog';

    public function blog_category()
    {
        return $this->belongsTo('App\Model\Blog_Category', 'blogcategory_id');
    }
    
    public function recommends(){

        return $this->belongsTo('App\Model\Blog_Recommend', 'blogrecommend_id');
    }
    public function scopeOrderDesc($query){

        return $query->orderBy('id', 'DESC');
    }   
    public function scopeStatusPopular($query){

        return $query->where('popular', 1)->inRandomOrder()->take(4);
    }
    public function scopeStatusRecommend($query){
        return $query->where('recommend', 1)->inRandomOrder()->take(4);
    }
    public function scopeViewedArticle($query, array $viewed)
    {
        return $query->whereIn('seo_url', $viewed)->inRandomOrder()->take(4);
    
    }
    public function scopeLastArticle($query, string $lastarticle){

        return $query->where('created_at', '>', $lastarticle )->inRandomOrder()->take(4);
    }
    public function scopeSeoTitle($query,  $seotitle){
        return $query->where('seo_url', $seotitle);
    }
}
