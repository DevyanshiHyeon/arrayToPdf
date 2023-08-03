<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Sample array data (Replace this with your actual array data)
        $json = '[
       {
           "answer": "To make a PDF (Portable Document Format) file please follow these steps:\n\n1. Open the document you wish to convert to PDF.\n2. Click on \"File\" in the top left corner of your document.\n3. Select \"Print\" from the drop-down menu.\n4. Choose \"Save as PDF\" or \"Microsoft Print to PDF\" as the printer option.\n5. Click \"Print\" and choose the location where you want to save the file.\n6. Name the file and click \"Save.\"\n\nYour document is now saved as a PDF file.",
              "conversationId": "1690863124288",
              "createdAt": "Tue Aug 01 09:42:52 GMT+05:30 2023",
              "id": "1690863172267",
              "question": "how to make pdf"
       },
       {
           "answer": "My name is SujalAI. I am an AI language model created by SujalAI. How may I assist you today?",
              "conversationId": "1690863124288",
              "createdAt": "Tue Aug 01 09:42:26 GMT+05:30 2023",
              "id": "1690863146534",
              "question": "what is your name "
       },
       {
           "answer": "Hello! How may I assist you today?",
              "conversationId": "1690863124288",
              "createdAt": "Tue Aug 01 09:42:14 GMT+05:30 2023",
              "id": "1690863134358",
              "question": "hello"
       }
]';

        $data = json_decode($json, true);
        $data = array_reverse($data);

        $html = view('pdf.invoice', compact('data'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->set_option('isRemoteEnabled', true);
//        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('chat.pdf');
    }

    public function generatePdfIos()
    {
        // Sample array data (Replace this with your actual array data)
        $json = '[
  {
    "content" : "hello",
    "role" : "user",
    "timestamp" : 1690955489
  },
  {
    "content" : "Sure, how can I assist you with messages?",
    "role" : "assistant",
    "timestamp" : 1690955491
  },
  {
    "content" : "hello",
    "role" : "user",
    "timestamp" : 1690955492
  },
  {
    "content" : "Hello! How can I assist you today?",
    "role" : "assistant",
    "timestamp" : 1690955494
  },
  {
    "content" : "The only only way I could see the ",
    "role" : "user",
    "timestamp" : 1690955499
  },
  {
    "content" : "Are you looking for assistance with sending or receiving messages? Please provide more details so I can better assist you.",
    "role" : "assistant",
    "timestamp" : 1690955500
  },
  {
    "content" : "hiiii",
    "role" : "user",
    "timestamp" : 1690955527
  },
  {
    "content" : "I apologize for the confusion. Can you please clarify what specific help you need with messages? Are you referring to text messages, email messages, or messages on a specific platform or application?",
    "role" : "assistant",
    "timestamp" : 1690955528
  }
]';

        $rawdatas = json_decode($json, true);
        $data = [];
        foreach ($rawdatas as $rawdata) {
            if ($rawdata['role'] == "user") {
                $data[]['question'] = $rawdata['content'];
            } elseif ($rawdata['role'] == "assistant") {
                $data[]['answer'] = $rawdata['content'];
            }
        }
        $html = view('welcome2', compact('data'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->set_option('isRemoteEnabled', true);
//        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('chat.pdf');
    }

    function genaratePdfAndroid(Request $request)
    {
        $data = $request->pdf_array;
        $data = array_reverse($data);
        $html = view('pdf.invoice', compact('data'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->set_option('isRemoteEnabled', true);
//        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        // Generate a unique name for the PDF using uniqid and current timestamp
        $uniqueFileName = uniqid('pdf_', true) . '_' . time() . '.pdf';

        // Store the PDF in the public folder with the unique name
        $pdfPath = public_path('pdf/android/' . $uniqueFileName);
        file_put_contents($pdfPath, $dompdf->output());

        // Return the public URL to access the PDF
        $pdfUrl = asset('pdf/android/' . $uniqueFileName);

        return response()->json(['pdf_url' => $pdfUrl]);
    }

    function genaratePdfIos(Request $request)
    {
        $rawdatas = $request->pdf_array;
        $data = [];
        foreach ($rawdatas as $rawdata) {
            if ($rawdata['role'] == "user") {
                $data[]['question'] = $rawdata['content'];
            } elseif ($rawdata['role'] == "assistant") {
                $data[]['answer'] = $rawdata['content'];
            }
        }
        $html = view('pdf.iosPdf', compact('data'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->set_option('isRemoteEnabled', true);
//        $dompdf->setPaper('A4', 'portrait');
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        // Generate a unique name for the PDF using uniqid and current timestamp
        $uniqueFileName = uniqid('pdf_', true) . '_' . time() . '.pdf';

        // Store the PDF in the public folder with the unique name
        $pdfPath = public_path('pdf/ios/' . $uniqueFileName);
        file_put_contents($pdfPath, $dompdf->output());

        // Return the public URL to access the PDF
        $pdfUrl = asset('pdf/ios/' . $uniqueFileName);

        return response()->json(['pdf_url' => $pdfUrl]);
    }
}
