<?php

namespace App\Http\Controllers\Shop\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Products;
use App\Model\shop\Action;
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
       $popular = Products::Popular()->get();
       $action = Action::all();

        if($search !== null){
          
            if (request()->sort == 'price_asc') {
            $product = Products::orderBy('price', 'ASC')->get();
            } 
            elseif (request()->sort == 'high_low') {
      
            } else {
       
            }
                            }
                         

       $data = [
                'product' => $product,
                'search' => $search,
                'recommend' => $recommend,
                'new' => $new,
                'popular' => $popular,
                'action' => $action,
               
       ];
       return view('site.pages.search')->with($data);
   }
}
