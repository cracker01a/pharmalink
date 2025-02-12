<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class previewController extends Controller
{

    public function index()
    {
        return view('preview.preview');
    }
    
    public function index1()
    {
        return view('preview.bull');
    }

    public function viewPDF()
    {
        // Charger la vue 'bull.blade.php' et récupérer son contenu HTML
        $html = view('preview.bull')->render();
    
        // Instancier l'objet PDF avec le contenu HTML
        $pdf = PDF::loadHTML($html);
    
        // Définir le papier en mode portrait (option par défaut)
        $pdf->setPaper('A4', 'portrait');
    
        // Retourner le PDF en flux
        return $pdf->stream('ordonance-portrait.pdf');
    }

    public function downloadPDF()
    {
        // Charger la vue 'bull.blade.php' et récupérer son contenu HTML
        $html = view('preview.bull')->render();

        // Instancier l'objet PDF avec le contenu HTML
        $pdf = PDF::loadHTML($html);

            // Définir le papier en mode portrait (option par défaut)
            $pdf->setPaper('A4', 'portrait');

        // Retourner le PDF en tant que fichier téléchargeable
        return $pdf->download('bull.pdf');
    }
}
