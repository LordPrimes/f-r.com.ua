<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentsRequest extends FormRequest
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
            'login' => 'max:15|filled|regex:/^[^A-z]+$/',
            'reach' => 'min:15|filled|regex:/^(?![\%\/\\\&\?\,\'\;\:\!\-\+\!\@\#\$\^\*\)\(]+$).+/',
            'limitations' => 'min:15|filled|regex:/^(?![\%\/\\\&\?\,\'\;\:\!\-\+\!\@\#\$\^\*\)\(]+$).+/',
            'comment' => 'min:15|filled|regex:/^(?![\%\/\\\&\?\,\'\;\:\!\-\+\!\@\#\$\^\*\)\(]+$).+/'
        ];
    }

    public function messages()
{
    return [
        'login.filled' => 'Поле должно быть заполнено',
        'login.max' => 'Имя не должно превышать 15 символов',
        'login.regex' => 'Запрешенно писать свое имя английскими буквами',
        'reach.min' => 'Поле "Доистоинства" должно иметь минимум 15 симовлов',
        'reach.filled' => 'Поле должно быть заполнено',
        'reach.regex' => 'Вы использовали запрещенные символы',
        'limitations.min' => 'Поле "Недостатки" должно иметь минимум 15 симовлов',
        'limitations.filled' => 'Поле должно быть заполнено',
        'limitations.regex' => 'Вы использовали запрещенные символы',
        'comment.min' => 'Поле "Ваше сообщение" должно иметь минимум 15 симовлов',
        'comment.filled' => 'Поле "Ваше сообщение" должно быть заполнено',
        'comment.regex' => 'Вы использовали запрещенные символы'
    ];
}
}
