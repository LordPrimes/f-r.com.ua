<?php

namespace App\Model\shop;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'Recommend';


    public function recommends(){

        return $this->belongsTo('App\Model\shop\Products', 'recommend_id');
    }
    
    public function scopeRecommend($query, $seo_url){

        return $query->where('seo_url', $seo_url)->inRandomOrder()->take(4);
    }
}
