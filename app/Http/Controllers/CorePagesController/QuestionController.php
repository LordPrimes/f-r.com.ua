<?php

namespace App\Http\Controllers\CorePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Question;

class QuestionController extends BaseController
{
   
    public function index(){

        $question = Question::orderBy('id','desc')->get();

        $data = [
            'questeion' => $question
        ];
        return view('site.pages.question')->with($data);
    }
}
