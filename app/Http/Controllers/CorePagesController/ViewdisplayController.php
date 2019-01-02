<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Products;
use App\Model\shop\Recommend;
use App\Model\shop\Comments;

class ViewdisplayController extends Controller
{
    public function show($seo_title)
    {
        session()->push('viewed_prod', $seo_title); 

        $viewprod = Products::ViewProduct($seo_title)->firstorfail();
        $recommend = Recommend::Recommend($seo_title)->get();
        
        $blog_id = $viewprod->id;
     
        $comments = Comments::VisableComments($blog_id)->get();
       

        $data = [
                'viewprod' => $viewprod,
                'recommend' => $recommend,
                'comments' => $comments
        ];
        return view('site.pages.view')->with($data);
    }

   
}
