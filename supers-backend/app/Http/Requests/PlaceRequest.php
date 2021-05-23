<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "latitude"=>    "required|string",
            "longitude"=>   "required|string",
            "description"=> "required|string",
            "type"=>        "required|string",
            "area"=>        "required|integer",
            "area_type"=>   "required|string",
            "currency"=>    "required|string",
            "user_id"=>     "required|integer",
        ];
    }
}
