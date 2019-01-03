<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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
            'phone' => 'required|regex:/^\+[0-9]\([0-9]{3}\)[0-9]{3}-[0-9]{4}$/',
            'email' => 'required|email',
            'adres' => 'required',
        ];
       
    }

    public function messages()
{
    return [
        'name.required' => 'Поле "Имя" должно быть заполненным',
        'phone.required'  => 'Поле "Телефон" должно быть заполненным',
        'phone.regex' => 'Телефон должен быть таком формете: +3(000)000-0000',
        'email.required' => 'Поле "Email" должно быть заполненным',
        'email.email' => 'Email должен быть такого формата: f-r@gmail.com',
        'adres.required' => 'Поле "Адресс" должно быть заполненным',
    ];
}
}
