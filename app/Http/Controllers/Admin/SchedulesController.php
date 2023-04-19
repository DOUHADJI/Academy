<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    //

    public function create( ScheduleRequest $request, $school)
    {
        
        $schedule = $request -> validated();
        $new_schedule = Schedule::create($schedule); 
    
        return redirect() -> route("get_admin_panel_schools_schedules_index",[
            "school" => $school,
            "id_parcours" => $new_schedule -> id,
            "grade" => $new_schedule -> grade
         ]);
    }
}