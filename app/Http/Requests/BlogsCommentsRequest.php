<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsCommentsRequest extends FormRequest
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
            'name' => 'max:15|filled|regex:/^[^A-z]+$/',
            'body' => 'min:15|filled|regex:/^(?![\%\/\\\&\?\,\'\;\:\!\-\+\!\@\#\$\^\*\)\(]+$).+/'
        ];
    }
    public function messages()
    {
        return [
            'name.filled' => 'Поле "Имя" должно быть заполнено',
            'name.max' => 'Имя не должно превышать 15 символов',
            'name.regex' => '*Запрешенно писать свое имя английскими буквами',
            'body.min' => 'Поле "Ваше сообщение" должно иметь минимум 15 симовлов',
            'body.filled' => 'Поле должно быть заполнено',
            'body.regex' => 'Вы использовали запрещенные символы'
        ];
    }
}
