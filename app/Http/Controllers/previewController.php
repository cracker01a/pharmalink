<?php

namespace App\Http\Controllers;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\QrCode;

use App\Helpers\Encrypt;






use Illuminate\Http\Request;


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
        // Données des médicaments
        $medicaments = [
            ['nom' => 'Paracétamol', 'dose' => '500mg', 'frequence' => '2 fois/jour'],
            ['nom' => 'Ibuprofène', 'dose' => '200mg', 'frequence' => '3 fois/jour'],
        ];
    
        // Convertir les médicaments en JSON encodé
        $dataQR = json_encode($medicaments);
    
        // Générer le QR Code avec les données des médicaments
        $qrCodePath = $this->generateQRCodeImage($dataQR); // Utiliser la méthode de génération de QR Code avec image
    
        // Charger la vue 'bull.blade.php' et récupérer son contenu HTML avec les variables
        $html = view('preview.bull', compact('medicaments', 'qrCodePath'))->render();
    
        // Instancier l'objet PDF avec le contenu HTML
        $pdf = PDF::loadHTML($html);
    
        // Définir le papier en mode portrait (option par défaut)
        $pdf->setPaper('A4', 'portrait');
    
        // Retourner le PDF en flux
        return $pdf->stream('ordonance-portrait.pdf');
    }
    public function downloadPDF()
{
    // Données des médicaments
    $medicaments = [
        ['nom' => 'Paracétamol', 'dose' => '500mg', 'frequence' => '2 fois/jour'],
        ['nom' => 'Ibuprofène', 'dose' => '200mg', 'frequence' => '3 fois/jour'],
    ];

    // Convertir les médicaments en JSON encodé
    $dataQR = json_encode($medicaments);

    // Générer le QR Code avec les données des médicaments
    $qrCodePath = $this->generateQRCodeImage($dataQR); // Utiliser la méthode de génération de QR Code avec image

    // Charger la vue 'bull.blade.php' et récupérer son contenu HTML avec les variables
    $html = view('preview.bull', compact('medicaments', 'qrCodePath'))->render();

    // Instancier l'objet PDF avec le contenu HTML
    $pdf = PDF::loadHTML($html);

    // Définir le papier en mode portrait
    $pdf->setPaper('A4', 'portrait');

    // Retourner le PDF en tant que fichier téléchargeable
    return $pdf->download('bull.pdf');
}

    

    private function generateQRCodeImage($data)
    {
        $writer = new PngWriter();
    
        $id_encrypt = Encrypt::encryptData($data, config('base.variables.key_encrypt'));
    
        $qrCode = QrCode::create($id_encrypt)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
    
        $result = $writer->write($qrCode)->getString();
    
        $qrImageResource = imagecreatefromstring($result);
        $qrWidth = imagesx($qrImageResource);
        $qrHeight = imagesy($qrImageResource);
    
        return $result;
    }
    
    
    
    
}
