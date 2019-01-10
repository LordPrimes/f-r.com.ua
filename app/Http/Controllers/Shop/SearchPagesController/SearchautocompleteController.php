<?php

namespace App\Http\Controllers\Shop\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Products;
use App\Http\Resources\Autocomplete;


class SearchautocompleteController extends BaseController
{
    public function autocomplete(Request $request ){

        $query = $request->get('query');

        $products = Products::Typehead($query)->get();   

        $output = null;
        if(isset($query)){
             foreach( $products as $row)
                {
        $output .= '<li><a href='.$row->seo_title.'>'.$row->name.'</a></li>';
                }
            }
            else {
                $output = null;
            }
        return response()->json([
            'view' => $output
        ]);
        
}
}