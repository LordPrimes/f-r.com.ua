<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\shop\Filter;
use App\Http\Requests\VoyagerFilterRequest;

class FiltersCreatAtributControllers extends Controller
{
    public function creat(VoyagerFilterRequest $request){

        $validated = $request->validated();

        $atribut = Filter::create([
            'parent_id' => $request->input('id'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        
        
            ]);

            session()->flash('goods', 'Атрибут успешно создан!');
            return back()->withInput(); 

    }
}
