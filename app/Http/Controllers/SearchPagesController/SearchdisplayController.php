<?php

namespace App\Http\Controllers\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;

class SearchdisplayController extends Controller
{
    public function show($seo_title)
    {
        $viewprod = Products::ViewProduct($seo_title)->firstorfail();

        $data = [
                'viewprod' => $viewprod
        ];
        return view('site.pages.view')->with($data);
    }

   
}
