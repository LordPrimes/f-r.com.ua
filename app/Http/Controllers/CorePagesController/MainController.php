<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Category;
use App\Model\shop\Slider;
use App\Model\shop\Action;
use App\Model\shop\Products;
use App\Model\Blogs\Blog;


class MainController extends Controller
{
    public function index (){

        $Slider = Slider::all();
        $categor = Category::all();
        $action = Action::Action()->get();
        $Recommend = Products::Recommend()->get();
        $blog = Blog::OrderDesc()->get();

        $data = [
                'Slider' => $Slider,
                'categor' => $categor,
                'action' => $action,
                'recommend' => $Recommend,
                'blog' => $blog
            

        ];

        return view('site.pages.main')->with($data);
    } 
}
