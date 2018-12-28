<?php

namespace App\Model\Blogs;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    public function blog_category()
    {
        return $this->belongsTo('App\Model\Blogs\Blog_Category', 'blogcategory_id');
    }
    
    public function recommendsOne(){

        return $this->hasOne('App\Model\Blogs\Blog_Recommend', 'recommend_id');
    }

    public function recommends(){

        return $this->hasMany('App\Model\Blogs\Blog_Recommend', 'recommend_id');
    }

    public function comments(){

        return $this->hasMany('App\Model\Blogs\Blog_Comment', 'blog_id');
    }
    public function commentOne(){

        return $this->hasOne('App\Model\Blogs\Blog_Comment', 'blog_id');
    }
    public function scopeOrderDesc($query){

        return $query->orderBy('id', 'DESC');
    }   
    public function scopeStatusPopular($query){

        return $query->where('popular', 1)->inRandomOrder()->take(3);
    }
    public function scopeStatusRecommend($query){

        return $query->where('recommend', 1)->inRandomOrder()->take(3);
    }
    public function scopeViewedArticle($query, array $viewed)
    {
        return $query->whereIn('seo_url', $viewed)->inRandomOrder()->take(3);
    
    }
    public function scopeLastArticle($query,  $lastarticle){

        return $query->where('created_at', '>', $lastarticle )->inRandomOrder()->take(3);
    }
    public function scopeSeoTitle($query,  $seotitle){
        
        return $query->where('seo_url', $seotitle);
    }
    public function scopeViewed($query , $seo_url){

        return $query->whereIn('seo_url', $seo_url)->take(3);
    }
    
    
}
