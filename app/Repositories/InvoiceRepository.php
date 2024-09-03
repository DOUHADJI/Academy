<?php

namespace App\Repositories;

use App\Models\Analys;
use App\Models\Report;
use App\Models\Invoice;
use App\Models\InvoiceAnalys;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Helpers\ApiResponsesHelper;

class InvoiceRepository
{

    public function checkIfAnalysHaveBeenAlreadyPaid(String $analyseId, String $report_id)
    {
        $alreadyPaid = InvoiceAnalys::where("analys_id", $analyseId)->where("report_id", $report_id)->exists();

        if ($alreadyPaid) {
            return true;
        }

        return false;
    }


    public function checkIfReportHaveBeenPayed(String $reportId)
    {
        $isPaid = Report::find($reportId)->is_payed;

        if ($isPaid) {
            return true;
        }

        return false;
    }

    public function checkIfHasPayForAllReportAnalyses(String $reportId)
    {
        $reportAnalysesCount = Report::find($reportId)->analyses->count();
        $paidAnalysesCount = InvoiceAnalys::where('report_id', $reportId)->get()->count();

        if($reportAnalysesCount === $paidAnalysesCount)
        {
            return true;
        }

        return false;
    }

    public function generatePaidAnalysesStringList(array $analyses)
    {
        return implode(',', $analyses);
    }

    public function createinvoiceForAlreadyPaidReport ($data, String $reportId)
    {

        $isCodeAlreadyTaken = Invoice::where("code", $data["invoiceCode"])->exists();
        if ($isCodeAlreadyTaken) {
            return new JsonResponse([
                "message" => ApiResponsesHelper::conflictMessage("bulletin d'analyse " . $data["invoiceCode"])
            ], Response::HTTP_ACCEPTED);
        }

        $isReportAlreadyPayed = $this->checkIfReportHaveBeenPayed($reportId);

        if($isReportAlreadyPayed)
        {
            $invoiceCode = Invoice::where("report_id", $reportId)->first()->code;
            return new JsonResponse([
                "message" => [
                    "title" => "Bulletin déjà payé",
                    "content" => "Ce bullentin a déjà été payé: Voir la facture " . $invoiceCode
                ]
            ], Response::HTTP_ACCEPTED);
        }

        $isAllAnalysesPaid = $this->checkIfHasPayForAllReportAnalyses($reportId);

        if ($isAllAnalysesPaid) {
            $report = Report::find($reportId);
            $report->is_payed = true;
            $report->save();
        }

        $paidAnalyses = [];
        foreach ($data["analyses"] as $analysId) {

            $isPaid = $this->checkIfAnalysHaveBeenAlreadyPaid($analysId, $reportId);
            if ($isPaid) {
                $analys = Analys::find($analysId)->name;
                array_push($paidAnalyses, $analys);
            }
        }

        if (count($paidAnalyses) > 0) {

            $paidAnalysesList = $this->generatePaidAnalysesStringList($paidAnalyses);

            return new JsonResponse([
                "message" => [
                    "title" => "Analyse(s) déjà payée(s)",
                    "content" => "L'analyse " . $paidAnalysesList . " a déjà été payé pour ce bulletin d'analyse"
                ]
            ], Response::HTTP_ACCEPTED);
        }

        $invoice = new Invoice();
        $invoice->code = $data["invoiceCode"];
        $invoice->primary_amount = $data["invoice_amount"];
        //      $invoice->reduction = $data["invoice_amount"];
        $invoice->final_amount = $data["invoice_amount"];
        $invoice->patient_id = $data["patient_id"];
        $invoice->report_id = $reportId;
        $invoice->save();


        if (count($data["analyses"]) > 0) {
            foreach ($data["analyses"] as $analys) {
                $invoiceAnalys = new InvoiceAnalys();
                $invoiceAnalys['analys_id'] = $analys;
                $invoiceAnalys['invoice_id'] = $invoice->id;
                $invoiceAnalys['report_id'] = $reportId;
                $invoiceAnalys->save();
            }
        }


        $isAllAnalysesPaid = $this->checkIfHasPayForAllReportAnalyses($reportId);

        if ($isAllAnalysesPaid) {
            $report = Report::find($reportId);
            $report->is_payed = true;
            $report->save();
        }

        return $invoice;
    }
}
