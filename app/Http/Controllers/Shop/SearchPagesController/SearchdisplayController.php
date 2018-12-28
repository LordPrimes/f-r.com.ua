<?php

namespace App\Http\Controllers\Shop\SearchPagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Products;
use App\Model\shop\Comments;
use App\Model\shop\Recommend;

class SearchdisplayController extends Controller
{
    public function show($seo_title)
    {
        $viewprod = Products::ViewProduct($seo_title)->firstorfail();
        $prod = $viewprod->id;

        $comments = Comments::VisableComments($prod)->get();

        $recommend = Recommend::Recommend($seo_title)->get();

        $data = [
                'viewprod' => $viewprod,
                'comments' => $comments,
                'recommend' => $recommend
        ];
        return view('site.pages.view')->with($data);
    }

   
}
