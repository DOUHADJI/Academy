<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateYearRequest;
use App\Models\SchoolYear;
use DateTime;
use GuzzleHttp\Promise\Create;

class SchoolYearController extends Controller
{
    /**
    *   Student routes here
    */

    public function student_see()
    {
        return view('user.school-year');
    }
    
    /**
    *   Admin routes here
    */
    public function index()
    {
        return view('admin.current-school-year');
    }

    

    public function define()
    {
        return view('admin.add-school-year');
    }

    public function store(CreateYearRequest $request)
    {
        $dates = $request->validated();
        $current = SchoolYear::where("is_current", 1)->first();

        if($current->end > $request->start)
        {
            return redirect()->route("showYear");
        }

        $current->update([
            "is_current" => false
        ]);
        
        /**
        * Les inscriptions débutent  une semaine après le début de l'année scolaire et durent 2 mois
        * L'harmattan débute 1 mois après début de l'année et dure 6 mois
        * Les congés prennent 1 mois ainsi que les examens
        * Période de 1mois de pause après fin harmattan
         */

        $date = new DateTime($dates["start"]);

        $year_start = $dates["start"];

        $inscription_start = date('Y-m-d', strtotime($year_start. '+ 7 days'));
        $inscription_end = date('Y-m-d', strtotime($inscription_start. '+ 60 days'));

        $harmattan_start = date('Y-m-d', strtotime($year_start. '+ 30 days'));
        $harmattan_end = date('Y-m-d', strtotime($harmattan_start. '+ 150 days'));

        $holydays_harmattan_start = date('Y-m-d', strtotime($harmattan_start. '+ 90 days'));
        $holidays_harmattan_end = date('Y-m-d', strtotime($holydays_harmattan_start. '+ 30 days'));

        $exams_harmattan_start = date('Y-m-d', strtotime($holidays_harmattan_end. '+ 31 days'));
        $exams_harmattan_end = date('Y-m-d', strtotime($exams_harmattan_start. '+ 30 days'));

        $mousson_start = date('Y-m-d', strtotime($exams_harmattan_end. '+ 30 days'));
        $mousson_end = date('Y-m-d', strtotime($harmattan_start. '+ 150 days'));

        $holydays_mousson_start = date('Y-m-d', strtotime($mousson_start. '+ 90 days'));
        $holidays_mousson_end = date('Y-m-d', strtotime($holydays_mousson_start. '+ 30 days'));

        $exams_mousson_start = date('Y-m-d', strtotime($holidays_mousson_end. '+ 31 days'));
        $exams_mousson_end = date('Y-m-d', strtotime($exams_mousson_start. '+ 30 days'));



        SchoolYear::create([
            "start" => $year_start,
            "end" => $dates["end"],
            "inscription_start" =>$inscription_start,
            "inscription_end" => $inscription_end,
            "harmattan_start" =>$harmattan_start,
            "harmattan_end" =>$harmattan_end,
            "hollydays_harmattan_start"=> $holydays_harmattan_start,
            "hollydays_harmattan_end" => $holidays_harmattan_end,
            "harmattan_exams_start" =>$exams_harmattan_start,
            "harmattan_exams_end" =>$exams_harmattan_end,
            "mousson_start"=> $mousson_start,
            "mousson_end"=>$mousson_end,
            "hollydays_mousson_start" =>$holydays_mousson_start ,
            "hollydays_mousson_end" => $holidays_mousson_end,
            "mousson_exams_start" => $exams_mousson_start,
            "mousson_exams_end" => $exams_mousson_end    
        ]);

        return redirect()->route('showYear');
    }
}