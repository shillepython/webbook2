<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostCreateReques extends FormRequest
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
            'title'       => 'required|min:5|max:100|unique:book_posts',
            'slug'        => 'max:100|unique:book_posts',
            'content_raw'   => 'required|string|min:5|max:10000',
            'category_id'   => 'required|integer|exists:book_categories,id',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
//    public function messages()
//    {
//        return [
//            'title.required'       => 'Поле для заголовка книги обязательное для заполнения',
//            'title.min'       => 'Минимальная длинна заголовка книги [:min] символов',
//            'title.max'       => 'Максимальная длинна заголовка книги [:max] символов',
//            'title.unique'       => 'Заголовок книги должен быть уникальным',
//
//            'slug.max'       => 'Максимальная длинна идентификатор книги [:max] символов',
//            'slug.unique'       => 'Идентификатор должен быть уникальным',
//
//            'content_raw.required'   => 'Поле для содержания книги обязательное для заполнения',
//            'content_raw.string'   => 'Содержание книги должно быть текстом',
//            'content_raw.min'   => 'Минимальная длинна содержания книги [:min] символов',
//            'content_raw.max'   => 'Максимальная длинна содержания книги [:max] символов',
//
//            'category_id.required'   => 'Поле для выбора категории обязательное для заполнения',
//            'category_id.integer'   => 'Категория должна быть числом',
//            'category_id.exists'   => 'Категория должна существовать в базе',
//        ];
//    }

}
