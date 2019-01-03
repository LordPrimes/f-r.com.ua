<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Category;
use App\Model\shop\Slider;
use App\Model\shop\Action;
use App\Model\shop\Products;
use App\Model\Blogs\Blog;


class MainController extends BaseController
{
    public function index (Request $request){

        $Slider = Slider::all();
        $categor = Category::all();
        $action = Action::Action()->get();
        $Recommend = Products::Recommend()->get();
        $blog = Blog::OrderDesc()->get();

        if ($request->session()->exists('viewed_prod')) {
            $view = session()->get('viewed_prod');
            $youviewed = Products::Viewed($view)->get();
          
        }
        else {
            $youviewed = null;
        }
      
        $data = [
                'Slider' => $Slider,
                'categor' => $categor,
                'action' => $action,
                'recommend' => $Recommend,
                'blog' => $blog,
                'youviewed' => $youviewed
            

        ];

        return view('site.pages.main')->with($data);
    } 
}
