<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'Seo';

    public function scopeSeoPages($query, $pages){

        return $query->where('pages', $pages);
    }
}
