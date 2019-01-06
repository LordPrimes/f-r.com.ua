<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Category;
use App\Model\shop\Products;

class CategoryController extends BaseController
{
    public function Category($slug)
    {
        
        $category= Category::where('slug', $slug)->firstorFail();
        $id = $category->parent_id;
        
        $prod = Products::where('category_id', $id)->get();

        $data = [
            'prod' => $prod
        ];

        return view('site.pages.categoryshop')->with($data);
    }
   
    public function index(){

        
        $category = Category::get();

        $data = [
            'category' =>$category
        ];
        
       return view('site.pages.catalog')->with($data);
    }
}
