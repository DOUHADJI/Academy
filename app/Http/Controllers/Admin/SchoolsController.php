<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Models\Offer;
use App\Models\School as SchoolModel;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    //

    public function index()
    {
        return view('admin.schools');
    }

    public function create(SchoolRequest $request)
    {
        $school = $request -> validated();

        SchoolModel::create($school);

        return view('admin.schools');
    }


    public function show(Request $request)
    {
        $sigle = $request -> school;
        $school = SchoolModel::where("sigle", $sigle) -> first();
        $schedules = SchoolModel::find($school-> id) -> schedules;
        $selected = $schedules -> where("id", $request -> id_parcours)->first();

        if (!isset($selected)) {
            $selected = $schedules -> first();
        }

        $offers = $selected -> offers;



        $selected_id = 0;

        if (isset($selected)) {
            $selected_id = $selected -> id;
        }


        //   dd($selected_id);

        return view("admin.school-schedules", [
            "school" => $school,
            "schedules" => $schedules,
            "selected_id" => $selected_id,
            "offers" => $offers
        ]);
    }
}