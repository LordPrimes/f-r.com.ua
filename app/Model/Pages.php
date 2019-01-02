<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    public function scopeSlug($query, $slug){

      return  $query->where('slug', $slug);

    }
}
