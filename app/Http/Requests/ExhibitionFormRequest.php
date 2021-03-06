<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionFormRequest extends FormRequest
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
            "title" => "required",
            "description" => "nullable",
            "img" => "image",
            "imgBanner" => "image",
            "from" => "date|date_format:Y-m-d",
            "to" => "date|date_format:Y-m-d",
            "catalog" => "nullable",
            "selected_works" => "nullable"
        ];
    }
}
