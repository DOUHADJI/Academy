<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if ($data) {
            if (Auth::attempt($data)) {

                $request->session()->regenerate();

                if(Auth::user()->role === "admin")
                {
                    return new JsonResponse([
                        'message' => 'user connected successfully',
                        "userPanelRoute" => "/administration/accueil"
                    ], Response::HTTP_OK );
                }

                if(Auth::user()->role === "teacher")
                {
                    return new JsonResponse([
                        'message' => 'user connected successfully',
                        "userPanelRoute" => "/espace-enseignant/accueil"
                    ], Response::HTTP_OK );
                }


                if(Auth::user()->role === "student")
                {
                    return new JsonResponse([
                        'message' => 'user connected successfully',
                        "userPanelRoute" => "/espace-etudiant/accueil"
                    ], Response::HTTP_OK );
                }

            } else {
                return new JsonResponse([
                    'message' => 'Identifiant ou mot de passe incorrect',
                    "statusCode" => Response::HTTP_ACCEPTED

                ], Response::HTTP_ACCEPTED);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
      //  $request->session()->regenerateToken();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'user disconnected successfully',
        ], 200);

    }
}
