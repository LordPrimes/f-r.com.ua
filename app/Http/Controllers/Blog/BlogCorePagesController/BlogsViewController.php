<?php
namespace App\Http\Controllers\Blog\BlogCorePagesController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Model\Blogs\Blog;
use App\Model\Blogs\Blog_Comment as Comment;
use App\Model\Blogs\Blog_Recommend as Recommend;
use Session;



class BlogsViewController extends Controller
{
    public function show (Request $request, $seo_url  ){

        session()->push('viewed', $seo_url); 
       
        $blog = Blog::SeoTitle($seo_url)
                        ->firstorFail();
                
        $recommend = Recommend::Recommend($seo_url)->get();
        
        $blogs = $blog->id;
      
        $comment = Comment::VisableComments($blogs)->get();
        $data = [
                'blog' => $blog,
                'recommend' => $recommend,
                'comment' => $comment        
                ];
        return view('site.pages.viewblog')->with($data);
    }

  

}
