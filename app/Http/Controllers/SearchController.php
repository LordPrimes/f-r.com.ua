<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
class SearchController extends Controller
{
    public function foundproduct ($seotitle){
        
        $products = Products::where('seotitle', 'LIKE', '%'.$seotitle.'%')->get();      
                    return response()->json($products);
            
    }


    public function allproduct (){
        return Products::all();
    
        
}

public function show(Request $request, $id)
{
    $article = Products::findOrFail($id);
    $article->update($request->all());

    return $article;
}
}
