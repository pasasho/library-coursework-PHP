<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Books extends FormRequest
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
            'book_name' => 'required',
            'author_id' => 'required',
            'genre_id' => 'required',
            'image_id' => 'required',
        ];
    }
}
