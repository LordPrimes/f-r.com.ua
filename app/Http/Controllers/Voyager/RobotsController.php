<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class RobotsController extends Controller
{
    public function index (){



    $contents = File::get('robots.txt'); 
    
    $data = [
        'contents' => $contents
    ];
    
     return view('vendor.voyager.pages.robots')->with($data);
        
    }

    public function edit(Request $request){
      
        $robotsedit = $request->input('edit');
        File::append('robots.txt', $robotsedit);

        session()->flash('goods', 'Изменения прошли успешно!');
        return back()->withInput(); 
        

    }
}
