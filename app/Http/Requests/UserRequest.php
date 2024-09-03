<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->getMethod() === 'POST')
        {
            return null;
        }

        return $this->updateRules();

    }

    private function updateRules ()
    {
        return [
            "name" => ["required", "string"],
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
            "date_of_birth" => ["required", "string"],
            "phone_number" => ["required", "string"],
            "email" => ["required", "email"],
        ];
    }
}
