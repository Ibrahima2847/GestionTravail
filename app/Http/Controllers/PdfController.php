<?php

namespace App\Http\Controllers;

use App\Mail\AnnonceMarkdownMail;
use App\Models\Materiel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\PDF;
use Dompdf\Adapter\PDFLib;
use Dompdf\Dompdf;
// use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    public function generatePdf()
{

    $materiel = DB::table('materiels')->get();

    $logoPath = public_path('/assets/img/logo.png');

    // Nom de l'entreprise
    $entreprise = 'KayJob';

    // Date d'aujourd'hui
    $date = date('d/m/Y');

    // Générer le PDF
    $dompdf = new Dompdf();
    $html = '<html>
    <head>
        <style>
            /* Styles pour le document */
            body {
                font-family: sans-serif;
                margin: 0;
                padding: 0;
            }
            .header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px;
                background-color: #eee;
            }
            .logo {
                width: 100px;
            }
            h1 {
                font-size: 24px;
                margin: 0;
            }
            .date {
                font-size: 16px;
                margin: 0;
            }
            .entreprise {
                font-size: 20px;
                font-weight: bold;
                margin: 20px 0;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <img src="'.$logoPath.'" class="logo" />
            <div>
                <h1>Mon document PDF</h1>
                <p class="date">'.$date.'</p>
            </div>
        </div>
        <div class="entreprise">'.$entreprise.'</div>
        <div class="entreprise">'."Devis sur les materiels".'</div>
        <table border="2" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($materiel as $donnee) {
                $html .= '<tr>
                    <td>'.$donnee->id.'</td>
                    <td>'.$donnee->description.'</td>
                    <td>'.$donnee->montant.'</td>
                </tr>';
            }
            $html .= '
        </tbody>
        </table>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget lacus a felis tristique lobortis. Nam sit amet est euismod, blandit tellus nec, consequat mauris. Aenean quis nunc orci. Sed fermentum interdum mi, a cursus justo dignissim id. Vivamus vitae congue nibh. Maecenas fringilla, nunc eget lacinia ullamcorper, nisl est euismod orci, non bibendum urna quam quis ante. Suspendisse potenti. In hac habitasse platea dictumst.</p>
    </body>
</html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();

        // Envoyer le PDF par email
        $pdfData = base64_encode($pdf);
        Mail::send([], [], function ($message) use ($pdfData) {
            $message->to('ibuseck670@gmail.com')
                    ->subject('Mon document PDF')
                    ->attachData(base64_decode($pdfData), 'document.pdf');
        });

        dd("Email envoyé");

    }

}
