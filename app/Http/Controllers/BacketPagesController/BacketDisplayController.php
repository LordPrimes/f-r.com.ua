<?php

namespace App\Http\Controllers\BacketPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BacketDisplayController extends Controller
{
    public function index (){
    return view('site.pages.backet');
    }
}
