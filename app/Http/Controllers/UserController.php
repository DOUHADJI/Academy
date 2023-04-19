<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfosRequest;
use App\Models\StudentInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //


    public function index()
    {
        $user = Auth::user();
        $user_id = $user -> id;
        $student = StudentInformation::where("user_id", $user_id)-> first();


       //dd($student);

        return view('student-informations',[
            'user' => $user,
          //  'student' => $student
        ]);
    }

}