<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Sample array data (Replace this with your actual array data)
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
            'address' => '123 Main Street',
        ];

        $html = view('pdf.invoice', compact('data'))->render();

        // Create a Dompdf instance and load the HTML content
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF
        return $dompdf->stream('invoice.pdf');
//        return response($html)->header('Content-Type', 'application/pdf');
    }
}
