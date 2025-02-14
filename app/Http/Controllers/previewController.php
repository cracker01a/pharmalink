<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $medicaments = [
            ['nom' => 'Paracétamol', 'dose' => '500mg', 'frequence' => '2 fois/jour'],
            ['nom' => 'Ibuprofène', 'dose' => '200mg', 'frequence' => '3 fois/jour'],
        ];
    
        // Convertir les médicaments en JSON encodé
        $dataQR = json_encode($medicaments);
    
        // Générer le QR code en base64
        // $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($dataQR));
    
        // Charger la vue 'bull.blade.php' et récupérer son contenu HTML avec les variables
        $html = view('preview.bull', compact('medicaments', ))->render();
    
        // Instancier l'objet PDF avec le contenu HTML
        $pdf = PDF::loadHTML($html);
    
        // Définir le papier en mode portrait (option par défaut)
        $pdf->setPaper('A4', 'portrait');
    
        // Retourner le PDF en flux
        return $pdf->stream('ordonance-portrait.pdf');
    
        // Si tu veux afficher la vue normale
        // return view('preview.bull', compact('medicaments', 'qrCode'));
    }
    

    public function downloadPDF()
    {
        $medicaments = [
            ['nom' => 'Paracétamol', 'dose' => '500mg', 'frequence' => '2 fois/jour'],
            ['nom' => 'Ibuprofène', 'dose' => '200mg', 'frequence' => '3 fois/jour'],
        ];
        // Convertir les médicaments en JSON encodé
          $dataQR = json_encode($medicaments);

    // Générer le QR code en base64
    $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($dataQR));

        // Charger la vue 'bull.blade.php' et récupérer son contenu HTML
        $html = view('preview.bull')->render();

        // Instancier l'objet PDF avec le contenu HTML
        $pdf = PDF::loadHTML($html);

            // Définir le papier en mode portrait (option par défaut)
            $pdf->setPaper('A4', 'portrait', compact('medicaments', 'qrCode'));
        

        // Retourner le PDF en tant que fichier téléchargeable
        return $pdf->download('bull.pdf');
    }
}
