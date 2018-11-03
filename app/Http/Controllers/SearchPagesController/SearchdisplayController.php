<?php

namespace App\Http\Controllers\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SearchdisplayController extends Controller
{
    public function index()
    {
        return view('site.pages.search');
    }

   
}
