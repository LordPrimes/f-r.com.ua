<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Products;
use App\Model\shop\Action;

class EventController extends Controller
{
    public function index(Request $request){

        $pagesname = $request->route()->getName();
        if ($pagesname == 'leaders')
            
        {
            $product = null;

            if (request()->sort == 'price_asc') {
               
             
                $action = Action::orderBy('new_price', 'asc')->paginate(12);
                
          
               
            }
            elseif (request()->sort == 'price_desc') {
                $action = Action::orderBy('new_price', 'desc')->paginate(12);
            } 
            else {    
                $action = Action::paginate(12);
              
                
            }
        }
             elseif  ($pagesname == 'popular'){
                $action = null;
             if (request()->sort == 'price_asc') {
                $product = Products::where('popular', 1)
                                    ->orderBy('price', 'asc')
                                    ->paginate(12);
            }
            elseif (request()->sort == 'price_desc') {
                $product = Products::where('popular', 1)
                                    ->orderBy('price', 'desc')
                                    ->paginate(12);
            } 
            elseif (request()->sort == 'A_Z') {
                $product = Products::where('popular', 1)
                                    ->orderBy('name', 'asc')
                                    ->paginate(12);
            }
            elseif  (request()->sort == 'Z_A') {
                $product = Products::where('popular', 1)
                                    ->orderBy('name', 'desc')
                                    ->paginate(12);       
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
