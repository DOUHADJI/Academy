<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
      //  dd($this -> school);
        
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
            "domaine" => ["required"],
            "titre_diplome" => ["required", "unique:schedules,titre_diplome"],
            "grade" => ["required"],
            "school_id" => ['required'],
            "nbr_semestres" => ["required"]
        ];
    }


    public function messages()
    {
        return [
            "required" =>"Champ :attribute requis : )",
            "unique" => "Ce parcours existe déjà"
        ];
    }
}