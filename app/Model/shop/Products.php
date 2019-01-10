<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;


class Products extends Model

{   
    protected $table = 'products'; 

    public function filters(){

        return $this->belongsToMany('App\Model\shop\Filter', 'filter_products','products_id','filter_id');
    }
    
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
    public function scopeSearchSort($query, $search){

        return $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('mini_description','LIKE', "%$search%")
                    ->orWhere('price','LIKE', "%$search%");
                

    }

    public function scopeTypehead($query, $search){

        return $query->where('name', 'LIKE', "%$search%")
                    ->orderBy('id', 'desc')
                    ->take(10);

    }

    public function scopeViewProduct($query, $seo_title){

        return $query->where('seo_title', $seo_title);
    }
    
    public function scopeRecommend($query){

        return $query->where('recommend', 1)->orderBy('id', 'DESC');
    }

    public function scopeNewWeeks($query, $new){

        return $query->where('created_at', '>', $new )->inRandomOrder()->take(3);
    }
    public function scopePopular($query){

        return $query->where('popular', 1)->orderBy('id', 'DESC');
    }

    public function scopeViewed($query , $seo_url){

        return $query->whereIn('seo_title', $seo_url)->inRandomOrder()->take(3);
    }

    public function scopeCatelogId($query, $id){

        return $query->where('category_id', $id)->orderby('id', 'asc');
   }
}
