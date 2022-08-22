<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagementMemberRequest extends FormRequest
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
                    "name" => "required|string|min:3",
                    "id_card" => "required|numeric|min:16|unique:users,id_card",
                    "date_of_birth" => "required|date",
                    "place_of_birth" => "required|string|min:4",
                    "email" => "required|email|unique:users,email",
                    "phone_number" => "required|min:12|numeric|unique:users,phone_number",
                    "proffesion" => "required|string",
                    "role" => "required|string",
                    "address" => "required|string",
                    "name_father" => "required|string|min:3",
                    "id_card_father" => "required|numeric|min:16|unique:families,id_card",
                    "date_of_birth_father" => "required|date",
                    "place_of_birth_father" => "required|string|min:4",
                    "phone_number_father" => "required|min:12|numeric|unique:families,phone_number",
                    "address_father" => "required|string",
                    "name_mother" => "required|string|min:3",
                    "id_card_mother" => "required|numeric|min:16|unique:families,id_card",
                    "date_of_birth_mother" => "required|date",
                    "place_of_birth_mother" => "required|string|min:4",
                    "phone_number_mother" => "required|min:12|numeric|unique:families,phone_number",
                    "address_mother" => "required|string",
                ];
            }
            case 'PUT':
                
            case 'PATCH':
            {
                return [
                    "name" => "required|string|min:3",
                    "id_card" => "required|numeric|min:16|unique:users,id_card,$this->id_card,id_card",
                    "date_of_birth" => "required|date",
                    "place_of_birth" => "required|string|min:4",
                    "email" => "required|email|unique:users,email,$this->email,email",
                    "phone_number" => "required|min:12|numeric|unique:users,phone_number,$this->phone_number,phone_number",
                    "proffesion" => "required|string",
                    "role" => "required|string",
                    "address" => "required|string",
                    "name_father" => "required|string|min:3",
                    "id_card_father" => "required|numeric|min:16|unique:families,id_card,$this->id_card_father,id_card",
                    "date_of_birth_father" => "required|date",
                    "place_of_birth_father" => "required|string|min:4",
                    "phone_number_father" => "required|min:12|numeric|unique:families,phone_number,$this->phone_number_father,phone_number",
                    "address_father" => "required|string",
                    "name_mother" => "required|string|min:3",
                    "id_card_mother" => "required|numeric|min:16|unique:families,id_card,$this->id_card_mother,id_card",
                    "date_of_birth_mother" => "required|date",
                    "place_of_birth_mother" => "required|string|min:4",
                    "phone_number_mother" => "required|min:12|numeric|unique:families,phone_number,$this->phone_number_mother,phone_number",
                    "address_mother" => "required|string",
                ];
            }
            default:break;
        }
    }
}
