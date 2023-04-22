<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdmissionSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::check())
        {
            return true;
        }
        
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "firstChoice" => ["required"],
            "secondChoice" => ["required"],
            "thirdChoice" => ["required"],
            "lettre_motivation" => ["required", "file"],
            "cv" => ["required", "file"],
            "releve_bepc" => ["required", "file"],
            "releve_bac_1" => ["required", "file"],
            "releve_bac_2" => ["required", "file"],
        ];
    }
}