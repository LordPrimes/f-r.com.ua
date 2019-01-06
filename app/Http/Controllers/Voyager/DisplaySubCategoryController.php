<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Category;

class DisplaySubCategoryController extends Controller
{
    public function index ($id){

        $Category = Category::find($id);

        $data = [
            'Category' => $Category

        ];

        return view('vendor.voyager.pages.editsubcategory')->with($data);
    }
}
