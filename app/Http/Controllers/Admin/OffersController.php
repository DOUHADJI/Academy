<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest as OffersRequestClass;
use App\Http\Requests\UpdateOfferRequest as UpdateOfferRequestClass;
use App\Models\Offer as OffersModel;
use App\Models\Schedule;
use App\Models\School;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    //

    public function create( OffersRequestClass $request, $school)
    {
             
        $offer = $request -> validated();
        $offer["grade"] = $request -> offer_grade;
        OffersModel::create($offer);
             

        return redirect() -> route('showSchool',[
            "school" => $school,
            "id_parcours" =>$request -> schedule_id
        ]);
    }

    public function show(Request $request)
    {
        
        $school = School::where("sigle", $request -> school) -> first();
        $schedule = Schedule::whereId($request -> id_parcours) -> first();
        $offer = OffersModel::where('code', $request -> code_cours) -> first() ;
  
        return view('admin.update-offer',[
            "school" => $school,
            "schedule" => $schedule,
            "offer" =>$offer 
        ]);
    }

    public function update(UpdateOfferRequestClass $request, $school)
    {
        $_offer = $request -> validated();

        $does_code_exists = OffersModel::where("code", $request->code)  -> get();
        $does_intitule_exists = OffersModel::where("intitule", $request->intitule)  -> get();
        
        if(count($does_code_exists) > 1)
        {
            return redirect() -> back() -> withErrors([
                "code" => "Un cours ayant ce code existe déjà"
            ]);
        }

        if(count($does_intitule_exists) >1 )
        {
            return redirect() -> back() -> withErrors([
                "intitule" => "Un cours ayant cet intitule existe déjà"
            ]);
        }
       
        $offer = OffersModel::whereId($request -> id) -> first();
        $offer -> update($_offer);
        
        
        return redirect() -> route('showSchool',[
            "school" => $school,
            "id_parcours" =>$request -> schedule_id
        ]);
        
    }

    public function delete(Request $request)
    {
        $offer = OffersModel::whereId($request -> offer_id) -> first();

        $offer -> delete();

        return redirect() -> route('showSchool',[
            "school" => $request -> school,
            "id_parcours" =>$request -> id_parcours
        ]);
    }


}