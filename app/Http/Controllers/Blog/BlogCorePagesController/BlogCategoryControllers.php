<?php

namespace App\Http\Controllers\Blog\BlogCorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Blogs\Blog;
use App\Model\Blogs\Blog_Category;
use Carbon\Carbon;
use App\Model\Seo;

class BlogCategoryControllers extends BaseController
{
    public function catagory (Request $request ,Blog_Category $Blog_Category){
     
        $date = Carbon::now()->subDays(7);
        
            $lastarticle = Blog::LastArticle($date)->get();
            $popularblog = Blog::StatusPopular()->get();
            $recommendblog = Blog::StatusRecommend()->get();

                if ($request->session()->exists('viewed')) {
                        $products = session()->get('viewed');
                        $youviewed = Blog::ViewedArticle($products)->get();
          
                                                            }
                 else {
                        $youviewed = null;
                    }
            $blog = $Blog_Category->blogs()->paginate(1);
            $category = $Blog_Category::with('blogs')->get();
        

                    $data = ['blog' => $blog, 
                             'category' => $category, 
                             'lastarticle' => $lastarticle, 
                             'popularblog' =>$popularblog, 
                             'recommendblog' => $recommendblog, 
                             'youviewed' => $youviewed
                                            
                ];
                return view('site.pages.blog')->with($data);
        
    }
}
