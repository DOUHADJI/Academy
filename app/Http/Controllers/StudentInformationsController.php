<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserInfosRequest;
use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Type\Time;

class StudentInformationsController extends Controller
{
    //

     public function index()
    {
        $informations = StudentInformation::where("user_id",Auth::id()) -> first();
        
      //  dd($informations);
        
        return view("user.student-informations");
        
    }

    public function show(Request $request)
    {
      
        return view("user.update-student-infos");
        
    }
    

    
    public function store(UserInfosRequest $request)
    {
        $informations = $request -> validated();
        
        $user_id = Auth::id();

        $email=null;

        if(isset($request -> email))
        {
            $email = array_pop($informations);
        }

        $does_student_exists = StudentInformation::where("user_id", $user_id) -> exists();
        
        $filename = time(). '.' . $request -> avatar -> extension();
        
        $avatar = $request->file("avatar") ->storeAs('avatars', $filename, "public");
        
        $informations["avatar"] = $avatar;

     //   dd($informations);
    

        if($does_student_exists)
        {
             $student = StudentInformation::where("user_id", $user_id) -> first();
            
             Storage::delete($student -> avatar);
             
             $student -> update($informations);

             $student -> avatar = $avatar;
             
             $student ->save();
             
             
            if(isset($email))
            {
          
                $user = Auth::user();
                $user -> email = $email;
                $user -> save();
            }
           
             return redirect() -> route("showStudent");
        }
           
        
        $informations["user_id"] = $user_id;
        
        StudentInformation::create($informations);
        
        return redirect() -> route('showStudent');
        
    }
}