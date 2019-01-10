<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Products;
use App\Model\shop\Action;

class EventController extends BaseController
{
    public function index(Request $request){

        $pagesname = $request->route()->getName();
        if ($pagesname == 'leaders')
            
        {
            $product = null;

            if (request()->sort == 'price_asc') {
               
             
                $action = Action::orderBy('new_price', 'asc')->paginate(1);
                $action->appends(['sort' => 'price_asc']);
                
          
               
            }
            elseif (request()->sort == 'price_desc') {
                $action = Action::orderBy('new_price', 'desc')->paginate(1);
                $action->appends(['sort' => 'price_desc']);
            } 
            else {    
                $action = Action::paginate(12);
              
                
            }
        }
             elseif  ($pagesname == 'popular'){
                $action = null;
             if (request()->sort == 'price_asc') {
                $product = Products::where('popular', 12)
                                    ->orderBy('price', 'asc')
                                    ->paginate(12);
                $product->appends(['sort' => 'price_asc']);
                                    
            }
            elseif (request()->sort == 'price_desc') {
                $product = Products::where('popular', 12)
                                    ->orderBy('price', 'desc')
                                    ->paginate(12);
                $product->appends(['sort' => 'price_desc']);
            } 
            elseif (request()->sort == 'A_Z') {
                $product = Products::where('popular', 12)
                                    ->orderBy('name', 'asc')
                                    ->paginate(12);
                $product->appends(['sort' => 'A_Z']);
            }
            elseif  (request()->sort == 'Z_A') {
                $product = Products::where('popular', 12)
                                    ->orderBy('name', 'desc')
                                    ->paginate(12);
                $product->appends(['sort' => 'Z_A']);                              
            }
            else {    
                $product = Products::Recommend()->paginate(12);
            }
       
                                                }
   

  
  
  

      
      
        $data = [
            'product' => $product,
            'pagesname' => $pagesname,
            'action' => $action
           
            
        ];

        return view('site.pages.event')->with($data);
    }

   
}
