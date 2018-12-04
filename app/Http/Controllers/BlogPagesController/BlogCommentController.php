<?php

namespace App\Http\Controllers\BlogPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog_Comment as Commment;

class BlogCommentController extends Controller
{
    public function index($id){

        $comment = Comment::ArticleComment($id)->firstofFail();
        return view('pages.blog.viewblog');
    }
}
