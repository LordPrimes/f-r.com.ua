<?php

namespace App\Http\Controllers\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;
use Carbon\Carbon;

class SearchController extends Controller
{
   public function show(Request $request ){
       $search = $request->input('query');
       if($search !== null){
       $product = Products::Search($search)->get();
       }
       else {
           $product = null;
       }
       $data = Carbon::now()->subDays(7);
       $new = Products::NewWeeks($data)->get();
       $recommend = Products::Recommend()->get();
        
       $data = [
                'product' => $product,
                'search' => $search,
                'recommend' => $recommend
       ];
       return view('site.pages.search')->with($data);
   }
}
