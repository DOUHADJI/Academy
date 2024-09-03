<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use PDF;

class PdfDocsHelper
{
    /**
     * Generate and store a PDF file.
     *
     * @param string $view
     * @param array $data
     * @param string $filename
     * @param string $directory
     * @return string The path to the stored PDF.
     */
    public static function generateAndStorePdf($view, $data, $filename, $directory = 'pdfs')
    {
        // Check if the PDF already exists
        $filePath = $directory . '/' . $filename;
        if (Storage::exists($filePath)) {
            return $filePath;
        }

        // Generate the PDF
        $pdf = PDF::loadView($view, $data);

        // Store the PDF in storage
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }

    /**
     * Retrieve a PDF file from storage.
     *
     * @param string $filename
     * @param string $directory
     * @return string|null The path to the PDF or null if it doesn't exist.
     */
    public static function getPdf($filename, $directory = 'pdfs')
    {
        $filePath = $directory . '/' . $filename;

        if (Storage::exists($filePath)) {
            return $filePath;
        }

        return null;
    }

    /**
     * Delete a PDF file from storage.
     *
     * @param string $filename
     * @param string $directory
     * @return bool True if the file was deleted, false otherwise.
     */
    public static function deletePdf($filename, $directory = 'pdfs')
    {
        $filePath = $directory . '/' . $filename;

        if (Storage::exists($filePath)) {
            return Storage::delete($filePath);
        }

        return false;
    }
}
