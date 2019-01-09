<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blogs\Blog;
use App\Model\Blogs\Blog_Recommend;
use App\Model\Blogs\Blog_Category;
use App\Model\shop\Products;
use App\Model\shop\Slider;
use App\Model\shop\Action;
use App\Model\shop\Category;
use App\Model\shop\Filter_Products;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;



class CacheController extends Controller
{
    public function index (){

        return view('vendor.voyager.pages.cache');
    }


    public function cache(){

        $date = Carbon::now()->addDays(31);

        $cache = Cache::remember('cache_database', $date, function(){

            $products = Products::all();
            $blog = Blog::all();
            $blog_recommend = Blog_Recommend::all();
            $blog_category = Blog_Category::all();
            $slider = Slider::all();
            $action = Action::all();
            $category = Category::all();
            $filter = Filter_Products::all();


            $data = [
                'products' => $products,
                'blog' => $blog,
                'blog_recommned' => $blog_recommend,
                'blog_category' => $blog_category,
                'slider' => $slider,
                'action' => $action,
                'category' => $category,
                'filter' => $filter
            ];
                return $data;
        });
  
        session()->flash('goods', 'Базы добавленны в кеш!');

        return back()->withInput(); 
       

      
    }

    public function cacheclear(){
        
        $cache = Cache::flush('cache_database');

        session()->flash('goods', 'Кеш успешно удален!');
        return back()->withInput(); 


    }

  
}

