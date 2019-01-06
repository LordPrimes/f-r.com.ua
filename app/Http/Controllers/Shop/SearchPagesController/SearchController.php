<?php

namespace App\Http\Controllers\Shop\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Products;
use App\Model\shop\Action;
use Carbon\Carbon;


class SearchController extends BaseController
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
     

       
          
        if (request()->sort == 'price_asc') {
            $product = Products::SearchSort($search)->orderBy('price', 'asc')->get();
        } 
        elseif (request()->sort == 'price_desc') {
            $product = Products::SearchSort($search)->orderBy('price', 'desc')->get();
        } 
        elseif (request()->sort == 'A_Z') {
            $product = Products::SearchSort($search)->orderBy('name', 'ASC')->get();
        }
        elseif  (request()->sort == 'Z_A') {
            $product = Products::SearchSort($search)->orderBy('name', 'DESC')->get();          
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
