<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\StudentSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentScheduleController extends Controller
{
    public function index()
    {        
        return view('user.choose-schedule');
    }

    public function inscription(Request $request)
    {
        $hasSchedule = StudentSchedule::where("user_id", Auth::id()) -> exists();

        if($hasSchedule)
        {
            $school_year = SchoolYear::orderBy("created_at", "desc") -> first();

            $hasAlreadyInscription = Inscription::where("school_year_id", $school_year->id)->where("student_schedule_id", $request->inscription_id) -> exists();
            
            if($hasAlreadyInscription)
            {            
                Inscription::where("school_year_id", $school_year->id)->where("student_schedule_id", $request->schedule_id) -> delete();
            }
            
            $payment = Payment::create([
                "code" => time(),
                "status" => "pending",
                "school_year_id" => $school_year->id,
                "user_id" => Auth::id(),
                "schedule_id" => $request->schedule_id
            ]);
            
            $inputs =  $request->collect()->except("_token","inscription_id","schedule_id");
            
            foreach($inputs as $data)
            {
                Inscription::create([
                    "school_year_id" => $school_year->id,
                    "offer_id" => $data,
                    "payment_id" => $payment->id,
                    "student_schedule_id" => $request->inscription_id
                ]);
            }
          
            return redirect()->route("seeUes");
        }
        else
        {
            $id = $request->choice;
            
            StudentSchedule::create([
                "code" => time(),
                "user_id" => Auth::id(),
                "schedule_id" => $id
            ]);
            
            return redirect()->route("showInscription");
        }
        

        
    }

    public function ues()
    {
        return view("user.fiche-ues");
    }
}