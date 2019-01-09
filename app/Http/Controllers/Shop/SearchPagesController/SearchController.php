<?php

namespace App\Http\Controllers\Shop\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Products;
use App\Model\shop\Action;
use App\Model\shop\Filter;
use App\Model\shop\Filter_Products;
use Carbon\Carbon;


class SearchController extends BaseController
{
   public function show(Request $request ){
      
        if ($request->has('query')){
        $search = $request->input('query');
        }
        else {
            $search = null;
        }
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
        
        $filter = Filter::get();
                                   
        $check = $request->all();

        if($check !== null){
        
        $filterResult = Filter::whereIn('slug', $check)->get();
     
        $ResultParametr = null;
        
        foreach($filterResult as $row )
        {
             $ResultParametr[] = $row->id;
        }
            
                            }
        else {
            $filterResult = null;
        }
           
     
        
       if($request->has('check')){

            $filterproducts = Filter_Products::whereIn('filter_id',$ResultParametr)->get();
      
       }
       else {
           $filterproducts = null;
       }
    
     
       $data = [
                'product' => $product,
                'search' => $search,
                'recommend' => $recommend,
                'new' => $new,
                'popular' => $popular,
                'action' => $action,
                'filter' => $filter,
                'filterproducts' => $filterproducts
               
       ];
       

       return view('site.pages.search')->with($data);
   }
   

  
}
