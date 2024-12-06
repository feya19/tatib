<?php
namespace App\Controllers;

use Dompdf\Dompdf;

// require_once __DIR__ . '/../public/dompdf/autoload.inc.php'; // Load manual library Dompdf

class InvoiceGenerateController {

    // Constructor (tidak lagi menggunakan model secara eksplisit)
    public function __construct() {
        // Jika Anda menggunakan model, pastikan file model di-load di sini secara manual.
    }

    // Fungsi untuk menghasilkan invoice (tanpa model)
    public function generateInvoice() {
        // Data statis untuk menggantikan fungsi model
        $data = [
            'nim' => '123456',
            'student_name' => 'John Doe',
            'student_class' => 'TI',
            'violation_id' => '1',
            'report_date' => '2024-12-05',
            'violation_type_name' => 'Tidak Mematuhi Peraturan',
            'sanction_level' => 'Ringan',
            'sanction_level_description' => 'Mahasiswa dikenakan peringatan tertulis.',
            'verifier_name' => 'Dr. Jane Smith',
            'verifier_nip' => '9876543210',
        ];

        // $this->generatePdf($data); // Generate PDF dengan data statis
    }

    public function pdf() {
        $html = "<h1>PDF Example</h1><p>This is a sample PDF content.</p>";
        Pdf::generatePdf($html, 'example.pdf');
    }

    // Fungsi untuk menggenerate PDF dengan Dompdf
    // private function generatePdf(array $data) {
    //     $html = $this->generateHtml($data); // memuat template html dari view

    //     $dompdf = new Dompdf(); // inisialisasi Dompdf
    //     $dompdf->loadHtml($html);

    //     $dompdf->setPaper('A4', 'portrait'); // set ukuran dan orientasi halaman
    //     $dompdf->render(); /// render PDF
    //     $dompdf->stream("Invoice_{$data['nim']}.pdf", ["Attachment" => true]); // kirim PDF ke browser
    //     exit;
    // }

    // Fungsi untuk memuat HTML dari view
    private function generateHtml(array $data): string {
        ob_start();
        include __DIR__ . '/../Views/invoiceGenerate.php'; // Pastikan file ini tersedia
        return ob_get_clean();
    }

    // Fungsi untuk mengirimkan respon error
    private function sendErrorResponse(string $message) {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => $message,
        ]);
        exit;
    }
}
