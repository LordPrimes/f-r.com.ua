<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;


class Products extends Model

{   
    protected $table = 'products'; 
    
    public function comments()
    {
        return $this->hasOne('App\Model\shop\Comments');
    }
    
    public function productaction(){

        return $this->hasMany('App\Model\shop\Action', 'action_id');
    }

    public function productactionOne(){

        return $this->hasOne('App\Model\shop\Action', 'action_id');
    }

    public function productrecommend(){

        return $this->hasMany('App\Model\shop\Recommend', 'recommend_id');
    }

    public function productrecommendOne(){

        return $this->hasOne('App\Model\shop\Recommend', 'recommend_id');
    }
    
    public function category() {

        return $this->belongsTo('App\Model\shop\Category', 'category_id');
    }
    public function scopeSearch($query, $search){

        return $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('mini_description','LIKE', "%$search%")
                    ->orWhere('price','LIKE', "%$search%")
                    ->orderBy('id', 'desc');

    }

    public function scopeViewProduct($query, $seo_title){

        return $query->where('seo_title', $seo_title);
    }
    
    public function scopeRecommend($query){

        return $query->where('recommend', 1)->orderBy('id', 'DESC');
    }

    public function scopeNewWeeks($query, $new){

        return $query->where('created_at', '>', $new )->inRandomOrder()->take(4);
    }
    public function scopePopular($query){

        return $query->where('popular', 1)->orderBy('id', 'DESC');
    }
}
