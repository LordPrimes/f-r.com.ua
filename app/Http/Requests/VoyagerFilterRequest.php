<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoyagerFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" должно быть заполнено',
            'slug.required' => 'Поле "SEO URL" должно быть заполнено',
      
        ];
    }
}
