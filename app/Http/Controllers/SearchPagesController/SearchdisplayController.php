<?php

namespace App\Http\Controllers\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;

class SearchdisplayController extends Controller
{
    public function index()
    {
        return view('site.pages.search');
    }

    public function show($seotitle)
    {
       
        $viewprod = Products::where('seotitle',$seotitle)->firstOrFail();
      

        return view('site.pages.view')->withViewprod($viewprod);   
    }
}
