<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Products extends Model

{   
 

    protected $table = 'products'; 
    public function comments()
    {
        return $this->hasOne('App\Model\Comments');
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

        return $query->where('recommend', 1)->take(4);
    }

    public function scopeNewWeeks($query, $new){

        return $query->where('created_at', '>', $new )->inRandomOrder()->take(4);
    }
}
