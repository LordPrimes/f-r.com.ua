<?php

namespace App\Http\Controllers\BlogPagesController;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator ;
use App\Http\Controllers\Controller;
use App\Model\blog;
use App\Model\Blog_Category;
use Carbon\Carbon;
use App\Model\Seo;
use Session;

class BlogController extends Controller
{
    public function index(Request $request){
        $blog = blog::OrderDesc()->paginate(1);
            $date = Carbon::now()->subDays(7);
            $lastarticle = blog::LastArticle($date)->get();
            $popularblog = blog::StatusPopular()->get();
            $recommendblog = blog::StatusRecommend()->get();

            if ($request->session()->exists('viewed')) {
                $products = session()->get('viewed');
                $youviewed = blog::Viewed($products)->get();
              
            }
            else {
                $youviewed = null;
            }
            $category = Blog_Category::all();
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
