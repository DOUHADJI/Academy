<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OfferRequest extends FormRequest
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
            "code" => ["required","unique:offers"],
            "intitule" => ["required", "unique:offers"],
            "credit" => ["required", "gt:1"],
            "nature" => ["required"],
            "semestre" => ["required"],
            "semestre_academique" => ["required"],
            "offer_grade" => ["required"],
            "schedule_id" => ["required"],
            
        ];
    }


    public function messages()
    {
        return [
          "required" => "Champ :attribute requis : )",
          "unique" => "Cette matière existe déjà" ,
          "gt" => ":attribute non valide"
        ];
    }
}