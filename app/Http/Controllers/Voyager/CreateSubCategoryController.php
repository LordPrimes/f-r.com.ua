<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Model\shop\Category;
use App\Http\Requests\VoyagerCategoryRequest;
use App\Http\Controllers\Controller;

class CreateSubCategoryController extends Controller
{
    
    public function index(VoyagerCategoryRequest $request ){
        $allcomments = Category::create([
            'parent_id' => $request->input('id'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        
        
            ]);

            session()->flash('goods', 'Подкатегория успешно созданна!');
            return back()->withInput();    
    }
}
