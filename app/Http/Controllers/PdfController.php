<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function cv(Request $request)
    {
        $admission = Admission::where("user_id", $request->id)->first();

        $cv = Storage::url($admission->cv);

        return  Response::make(file_get_contents(asset($admission->cv)), 200, [
            "content-type" => "application/pdf"
        ]);
    }

    public function fiche_ue()
    {
        $payment = Payment::where('user_id', Auth::id())->orderby('school_year_id', "desc")->first();
        // $file = view('ficheUE');
       //  $html = $file -> render();
       //    dd($html); 
       
        $pdf = Pdf::loadView('ficheUE',[
            "payment" => $payment
           ]);
    
        return $pdf->download("fiche-UE.pdf");

       
    }
}