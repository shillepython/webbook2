<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostFilterRequest extends FormRequest
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
            'price_before' =>  'integer|min:0',
            'price_after' =>  'integer|min:0',

            'title'     =>  'max:150',
        ];
    }

//    public function messages()
//    {
//        return [
//            'title.max'      => 'Максимальная длинна поля заголовк 150 символов',
//
//            'price_before.integer'      => 'Поле цена(от) должно быть заполнено цыфрами',
//            'price_before.min'      => 'Минимальная длинна поля цена(от) 0 символов',
//            //'price_before.max'      => 'Максимальная длинна поля цена(от) 150 символов',
//
//            'price_after.integer'      => 'Поле цена(до) должно быть заполнено цыфрами',
//            'price_after.min'      => 'Минимальная длинна поля цена(до) 0 символов',
//            //'price_after.max'      => 'Максимальная длинна поля цена(до) 150 символов',
//        ];
//    }
}
