<?php

namespace App\Http\Controllers\ViewPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;

class ViewDisplayController extends Controller
{
    public function show($seotitle)
    {
        $viewprod = Products::where('seotitle',$seotitle)->firstOrFail();
        return view('site.pages.view')->withViewprod($viewprod);   
    }


}
