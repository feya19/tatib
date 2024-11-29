<?php

namespace Helpers;

class Pdf {
    public static function generatePdf(string $htmlContent, string $filename): void {
        // Example using Dompdf library
        // require_once '../vendor/dompdf/autoload.inc.php'; // Place Dompdf in your project manually

        // $dompdf = new \Dompdf\Dompdf();
        // $dompdf->loadHtml($htmlContent);
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        // $dompdf->stream($filename, ['Attachment' => false]);
    }
}
