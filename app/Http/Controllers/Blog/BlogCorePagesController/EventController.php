<?php

namespace App\Http\Controllers\Blog\BlogCorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Blogs\Blog;

class EventController extends BaseController
{
    public function index (Request $request){
        
        $pagesname = $request->route()->getName();
        
        if ($pagesname == "blog.popular")
        {
            $article = Blog::Popular()->paginate(12);

        }
        elseif ($pagesname == "blog.recommend"){
            $article = Blog::Recommend()->paginate(12);
        }

        $data = [
            'article' => $article
            

        ];

        return view('site.pages.eventblog')->with($data);
    }
}
