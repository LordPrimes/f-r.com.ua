<?php

namespace App\Http\Controllers\CorePagesController;
use App\Http\Requests\AddCommentsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\shop\Comments;


class ViewPostController extends BaseController
{
    public function addcomments ( AddCommentsRequest $request  ){
        $validated = $request->validated();

        $allcomments = Comments::create([
        'name' => $request->input('login'),
        'description' => $request->input('reach'),
        'bad_comments' => $request->input('limitations'),
        'good_comments' => $request->input('comment'),
        'visable' => 0,
        'products_id' => $request->input('prod_id')
        ]);

        session()->flash('goods', 'Ваше комментарий добавлен на обработку');

        return back()->withInput();
       
    }




    
}
