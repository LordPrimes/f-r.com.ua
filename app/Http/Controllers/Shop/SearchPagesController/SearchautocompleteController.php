<?php

namespace App\Http\Controllers\Shop\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Products;
use App\Http\Resources\Autocomplete;


class SearchautocompleteController extends Controller
{
    public function autocomplete(Request $request ){

        $query = $request->get('query');

        $products = Products::Typehead($query)->get();   

        $output = null;
        
             foreach( $products as $row)
                {
        $output .= '<li><a href='.$row->seo_title.'>'.$row->name.'</a></li>';
                }
        
        return response()->json([
            'view' => $output
        ]);
        
}
}