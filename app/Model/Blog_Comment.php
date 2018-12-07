<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog_Comment extends Model
{
    protected $table = 'BlogComment';

    protected $fillable = array('id','name', 'body', 'visable', 'blog_id');
}
