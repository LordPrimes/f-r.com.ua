<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog_Comment extends Model
{
    protected $table = 'BlogComment';

    protected $fillable = array('id','name', 'body', 'visable', 'blog_id');

    public function blogcomments(){

      return  $this->belongsTo('App\Model\Blog', 'blog_id');
    }

    public function scopeViewBlogComment($query, $id){

        return $query->where('blog_id', $id)->orderBy('id', 'desc');

    }
}
