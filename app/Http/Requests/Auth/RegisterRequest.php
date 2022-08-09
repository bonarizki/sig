<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            case 'POST':
            {
                return [
                    "name" => "required|string",
                    "nik" => "required|numeric|unique:users,id_card",
                    "date_of_birth" => "required|date",
                    "place_of_birth" => "required|string",
                    "email" => "required|email|unique:users,email",
                    "pass" => "required|min:6",
                    "re_pass" => "required|min:6|same:pass"
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
               
                return [
                    "name_father" => "required|string|min:3",
                    "id_card_father" => "required|numeric|min:16|unique:parents,id_card,$this->id_card_father,id_card",
                    "date_of_birth_father" => "required|date",
                    "place_of_birth_father" => "required|string|min:4",
                    "phone_number_father" => "required|min:12|numeric|unique:parents,phone_number,$this->phone_number_father,phone_number",
                    "address_father" => "required|string",
                    "name_mother" => "required|string|min:3",
                    "id_card_mother" => "required|numeric|min:16|unique:parents,id_card,$this->id_card_mother,id_card",
                    "date_of_birth_mother" => "required|date",
                    "place_of_birth_mother" => "required|string|min:4",
                    "phone_number_mother" => "required|min:12|numeric|unique:parents,phone_number,$this->phone_number_mother,phone_number",
                    "address_mother" => "required|string",
                 ];
            }
            default:break;
        }
    }
        

    public function messages()
    {
        return [
            "name.required" => "The Name field is required.",
            "nik.required" => "The ID Number field is required.",
            "nik.numeric" => "The ID Number must be a number.",
            "nik.unique" => "The ID Number has already been taken.",
            "date_of_birth.required" => "The Date of Birth field is required.",
            "date_of_birth.date" => "The Date of Birth is not a valid date.",
            "place_of_birth.required" => "The Place of Birth field is required.",
            "email.required" => "The Email field is required.",
            "email.email" => "The Email must be a valid email address.",
            "email.unique" => "The Email has already been taken.",
            "pass.required" => "The Password field is required.",
            "pass.min" => "The Password must be at least 6 characters.",
            "re_pass.required" => "The Repeat Password field is required.",
            "re_pass.min" => "The Repeat Password must be at least 6 characters.",
            "re_pass.same" => "The Repeat Password and Password must match.",
        ];
    }

   
}
