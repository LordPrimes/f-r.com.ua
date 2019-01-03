<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Pages;


class ThemingController extends BaseController
{
    public function index(Request $request){
        
        $pagesname = $request->route()->getName();  

        $pages = Pages::Slug($pagesname)->firstorFail();
      
        $data = [
            'pages' => $pages

        ];
        return view('site.pages.theming')->with($data);
    }
}
