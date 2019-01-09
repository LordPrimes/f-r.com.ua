<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Filter;

class FiltersAtributControllers extends Controller
{
    public function index($id){
   
        $filter = Filter::find($id);

        $data = [
            'filter' => $filter
        ];

        return view('vendor.voyager.pages.editatribut')->with($data);

    }

  
}
