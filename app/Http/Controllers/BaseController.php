<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Model\Seo;

abstract class BaseController extends Controller
{
    public function __construct(Request $request)
    {
        $pagesname = $request->route()->getName(); 
        $Seo = Seo::SeoPages($pagesname)->get();
            View::share('seo', $Seo);
    }
}
