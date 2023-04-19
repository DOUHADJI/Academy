<?php

namespace App\Http\Requests;

use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserInfosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $auth_status = Auth::check();

        if ($auth_status) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(Request $request): array
    {
        
       $id =Auth::id();
       
        $rules = [
            "nom" => ["required","min:2"],
            "prenom" => ["required","min:2"],
            "lieu_naissance" => ["required","min:2"],
            "date_naissance" => ["required"],
            "pays_naissance" => ["required"],
            "nationalite" => ["required"],
            "sexe" => ["required"],
            "situation_famille" =>["required"],
            "adresse"=>["required","min:2"],
            "ville" =>["required","min:2"],
            "quartier" =>["required","min:2"],
            "annee_bac" =>["required"],
            "mention_bac" =>["required"],
            "serie_bac" =>["required"],
            "pays_bac" =>["required"],
            "num_table_bac" =>["required","min:5"],
            "grade" =>["required"],
            "avatar" => ["required", "image"],
            "telephone" => ["required","min:8"]
        ];

        $does_telephone_exists = StudentInformation::where("telephone", $request ->telephone ) 
                                                 ->where("user_id", "!=" ,$id) -> get();
            
    
        if(count($does_telephone_exists) >= 1)
        {
            $rules["telephone"] = ["required","min:8", 'unique:student_information,telephone'];
        }

        $is_email_defined = isset($request->email);

        if ($is_email_defined) {
            
            $does_email_exists = User::where("email", $request ->email ) ->where("id", "!=" ,$id) -> get();
            
           
            if(count($does_email_exists) >= 1)
            { 
            
                $rules["email"] = ["required","email", 'unique:users,email'];

            } 
            else
            {
                $rules["email"] = ["required", "email"];
            }
            
           
        }
               
        return $rules;
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
            'email' => 'Veuillez saisir un email valide',
            'min' => ':attribute non valide',
            'unique' => 'Ce numéro est déjà assigné',
            "email.unique" => "Email déjà existant"
            

        ];
    }
}