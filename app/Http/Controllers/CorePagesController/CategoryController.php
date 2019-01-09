<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Category;
use App\Model\shop\Products;

class CategoryController extends BaseController
{
    public function Category(Request $request, $slug)
    {
        
        $category= Category::Catalog($slug)->firstorFail();

        $id = $category->id;

        if (request()->sort == 'price_asc') {
            $product = Products::where('category_id', $id)
                                ->orderBy('price', 'asc')
                                ->paginate(12);
                                
        }
        elseif (request()->sort == 'price_desc') {
            $product = Products::where('category_id', $id)
                                ->orderBy('price', 'desc')
                                ->paginate(12);
        } 
        elseif (request()->sort == 'A_Z') {
            $product = Products::where('category_id', $id)
                                ->orderBy('name', 'asc')
                                ->paginate(12);
        }
        elseif  (request()->sort == 'Z_A') {
            $product = Products::where('category_id', $id)
                                ->orderBy('name', 'desc')
                                ->paginate(12);       
        }
        else {    
            
            $product = Products::CatelogId($id)->paginate(12);
        }
        
        $data = [
            'product' => $product
          
        ];
   
        return view('site.pages.categoryshop')->with($data);
    }
   
    public function index()
    {
        $category = Category::get();

        $data = [
            'category' =>$category
                ];

       return view('site.pages.catalog')->with($data);
    }
}
