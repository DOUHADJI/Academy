<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/* $logo_path = public_path()."/GU-logo.png";
$logoType = pathinfo($logo_path, PATHINFO_EXTENSION);
$data = file_get_contents($logo_path);
$logo = "data:image/". $logoType . ';base:64,'. base64_encode($data); */




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


        $pdf = Pdf::loadView('ficheUE', [
            "payment" => $payment
        ])->setPaper("a4", "lanscape");

        return $pdf->stream("fiche-UE.pdf");


    }

    public function payment()
    {
        $logo_path = public_path()."/images/GU-logo.png";
        $logoType = pathinfo($logo_path, PATHINFO_EXTENSION);
        $data = file_get_contents($logo_path);
        $logo = "data:image/". $logoType . ';base:64,'. base64_encode($data);
        // dd($logo);


        $payment = Payment::where('user_id', Auth::id())->orderby('school_year_id', "desc")->first();
        $pdf = Pdf::loadView('fiche-payement', [
            "payment" => $payment,
            "logo" => $logo
        ])->setPaper("a4", "landscape");

        return $pdf->stream();

    }

    public function inscription()
    {
        $logo_path = public_path()."/images/GU-logo.png";
        $logoType = pathinfo($logo_path, PATHINFO_EXTENSION);
        $data = file_get_contents($logo_path);
        $logo = "data:image/". $logoType . ';base:64,'. base64_encode($data);
        // dd($logo);


        $payment = Payment::where('user_id', Auth::id())->orderby('school_year_id', "desc")->first();
        $pdf = Pdf::loadView('fiche-payement', [
            "payment" => $payment,
            "logo" => $logo
        ])->setPaper("a4", "landscape");

        return $pdf->stream();
    }
}