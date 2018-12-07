<?php

namespace App\Http\Controllers\BlogPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogsCommentsRequest;
use App\Model\Blog_Comment as Commments;

class BlogCommentController extends Controller
{
    public function addcomments ( BlogsCommentsRequest $request  ){
        $validated = $request->validated();
        $seo_url = $request->input('seo_url');
        $allcomments = Commments::create([
        'name' => $request->input('name'),
        'body' => $request->input('body'),
        'blog_id' => $request->input('article_id'),
        'visable' => 0,
        ]);
        session()->flash('goods', 'Ваш комментарий добавлен на обработку');
        return back()->withInput();
       
    }
}
