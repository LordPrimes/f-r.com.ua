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
            $lastarticle = blog::where('created_at', '>', $data  )
                                ->inRandomOrder()
                                ->take(4)
                                ->get();
            $popularblog = blog::StatusPopular()->get();
            $recommendblog = blog::StatusRecommend()->get();

            if ($request->session()->exists('viewed')) {
                $products = session()->get('viewed');
                $youviewed = blog::whereIn('seo_url', $products)->take(10)->get();
              
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
