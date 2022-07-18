<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
                   "event_name" => "required|string",
                   "slug" => "required|string",
                   "excert" => "required|string",
                   "event_content" => "required|string",
                   "event_of_date" => "required|string"
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    "event_name" => "required|string",
                    "slug" => "required|string",
                    "excert" => "required|string",
                    "event_content" => "required|string",
                    "event_of_date" => "required|string"
                 ];
            }
            default:break;
        }
    }
}
