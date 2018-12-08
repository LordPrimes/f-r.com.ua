<?php

namespace App\Http\Controllers\BlogPagesController;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator ;
use App\Http\Controllers\Controller;
use App\Model\blog;
use App\Model\Blog_Category;
use Carbon\Carbon;
use Session;

class BlogController extends Controller
{
    public function index(Request $request){
        $blog = blog::OrderDesc()->paginate(1);
            $data = Carbon::now()->subDays(7);
            $lastarticle = blog::LastArticle($data)->get();
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
                
                        $data = ['blog' => $blog, 
                        'category' => $category, 
                        'lastarticle' => $lastarticle, 
                        'popularblog' =>$popularblog, 
                        'recommendblog' => $recommendblog, 
                        'youviewed' => $youviewed,                
           ];
           return view('site.pages.blog')->with($data);
                     
    }

}
