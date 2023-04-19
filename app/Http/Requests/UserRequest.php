<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $guest = Auth::guest();

        if($guest){
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
            'email' => ['required', 'email','unique:users,email'],
            'password' => ['required', Password::min(8) -> mixedCase()]
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
    public function messages(): array
    {
        return [
            'required' => 'Champ :attribute requis : )',
            'email' => 'Email invalide ',
            'unique'=> 'Ce email existe déjà',
            'min' => 'Mot de passe trop court',
            'Password::mixedCase' =>'Le mot de passe doit contenir au moins une majuscule'
        ];
    }
}