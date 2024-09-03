<?php

namespace App\Http\Controllers;

use App\Helpers\PdfDocsHelper;
use Illuminate\Http\Request;

class PrintPdfDocsController extends Controller
{
    public function printReport(String $report)
    {
        $pdfPath = PdfDocsHelper::getPdf($report);

        if ($pdfPath) {
            return response()->file(storage_path('app/' . $pdfPath), [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; report="' . $report . '"'
            ]);
        }
    }


    public function printInvoice(String $invoice)
    {
        $pdfPath = PdfDocsHelper::getPdf($invoice);

        if ($pdfPath) {
            return response()->file(storage_path('app/' . $pdfPath), [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; invoice="' . $invoice . '"'
            ]);
        }
    }
}
