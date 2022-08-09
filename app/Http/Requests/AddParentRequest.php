<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddParentRequest extends FormRequest
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
            "name_father" => "required|string|min:3",
            "id_card_father" => "required|numeric|min:16|unique:parents,id_card",
            "date_of_birth_father" => "required|date",
            "place_of_birth_father" => "required|string|min:4",
            "phone_number_father" => "required|min:12|numeric|unique:parents,phone_number",
            "address_father" => "required|string",
            "name_mother" => "required|string|min:3",
            "id_card_mother" => "required|numeric|min:16|unique:parents,id_card",
            "date_of_birth_mother" => "required|date",
            "place_of_birth_mother" => "required|string|min:4",
            "phone_number_mother" => "required|min:12|numeric|unique:parents,phone_number",
            "address_mother" => "required|string",
        ];
    }
}
