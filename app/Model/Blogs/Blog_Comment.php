<?php

namespace App\Model\Blogs;

use Illuminate\Database\Eloquent\Model;

class Blog_Comment extends Model
{
    protected $table = 'BlogComment';

    protected $fillable = array('id','name', 'body', 'visable', 'blog_id');

    public function blogcomments(){

      return  $this->belongsTo('App\Model\Blogs\Blog', 'blog_id');
    }

    public function scopeViewBlogComment($query, $id){

        return $query->where('blog_id', $id)->orderBy('id', 'desc');

    }
    public function scopeVisableComments($query, $blog_id){

        return $query->where('visable', 1)->where('blog_id', $blog_id)->orderBy('id', 'desc');
    }
}
