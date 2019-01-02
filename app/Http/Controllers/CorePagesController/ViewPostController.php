<?php

namespace App\Http\Controllers\CorePagesController;
use App\Http\Requests\AddCommentsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;
use App\Model\Comments;
use Intervention\Image\Facades\Image as Image;

class ViewPostController extends Controller
{
    public function addcomments ( AddCommentsRequest $request  ){
        $validated = $request->validated();
        $allcomments = Comments::create([
        'name' => $request->input('login'),
        'description' => $request->input('reach'),
        'bad_comments' => $request->input('limitations'),
        'good_comments' => $request->input('comment'),
        'visable' => 0,
        'products_id' => 1
        ]);
        session()->flash('goods', 'Ваше комментарий добавлен на обработку');
        return back()->withInput();
       
    }




    
}
