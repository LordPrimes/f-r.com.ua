<?php

namespace App\Http\Controllers\BlogPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\blog;
use App\Model\Blog_Category;
use Carbon\Carbon;
use App\Model\Seo;

class BlogCategoryControllers extends Controller
{
    public function catagory (Request $request ,Blog_Category $Blog_Category){
     
        $date = Carbon::now()->subDays(7);
        
            $lastarticle = blog::LastArticle($date)->get();
            $popularblog = blog::StatusPopular()->get();
            $recommendblog = blog::StatusRecommend()->get();

                if ($request->session()->exists('viewed')) {
                        $products = session()->get('viewed');
                        $youviewed = blog::ViewedArticle($products)->get();
          
                                                            }
                 else {
                        $youviewed = null;
                    }
            $blog = $Blog_Category->blogs()->paginate(1);
            $category = $Blog_Category::with('blogs')->get();
            $pagesname = $request->route()->getName();
            $seo = Seo::SeoPages($pagesname)->get();

                    $data = ['blog' => $blog, 
                             'category' => $category, 
                             'lastarticle' => $lastarticle, 
                             'popularblog' =>$popularblog, 
                             'recommendblog' => $recommendblog, 
                             'youviewed' => $youviewed, 
                             'seo' => $seo                
                ];
                return view('site.pages.blog')->with($data);
        
    }
}
