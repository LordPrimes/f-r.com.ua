<?php

namespace App\Http\Controllers\MainPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index (){
        return view('site.pages.main');
    } 
}
