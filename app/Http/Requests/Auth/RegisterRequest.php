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
