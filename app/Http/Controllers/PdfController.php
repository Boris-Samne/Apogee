<?php
// app/Http/Controllers/PdfController.php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\pdf as PDF;

class PdfController extends Controller
{
    public function generatePdf($results, $user)
    {   
        
                // Calculer la moyenne
                $moyenne = 10;

        $pdf = PDF::loadView('pdf.template', compact('results', 'moyenne'));

        return $pdf->download('monReleve.pdf');
    }
}
