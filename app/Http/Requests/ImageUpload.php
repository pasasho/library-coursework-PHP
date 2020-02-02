<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ImageUpload extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'imageDescription' => 'required',
            'customImage' => 'required|image|mimes:jpeg,bmp,png'
        ];
    }
}
