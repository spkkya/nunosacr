<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkFormRequest extends FormRequest
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
            "name" => "required",
            "description" => "nullable",
            "price" => "nullable",
            "desconto" => "nullable",
            "artist" => "integer|required",
            "img" => "image",
            "opportunity" => "boolean|required"
        ];
    }
}
