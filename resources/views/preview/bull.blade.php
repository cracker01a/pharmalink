<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Médicale</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header .left {
            width: 60%;
        }

        .header .right {
            
            width: 40%;
            margin-top: -80px;
            margin-left: 450px;
        }

        .header .right p {
            margin: 2px 0;
            
        }

        .box {
            border: 3px solid #000;
            padding: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
        .box .details p {
            margin: 2px 0; /* Réduit les marges entre les lignes */
            line-height: 1.2; /* Réduit l'interligne (par défaut, c'est 1.5) */
        }

        .box .details {
            width: 95%;
        }
        .details {
            margin:-5px;
        }

        .box .qr-code {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
        }
        .qr-code{
            margin-top:-100px;
            margin-left:545px;
        }

        .content {
            margin-bottom: 20px;
        }

        .content strong {
            display: block;
            margin-bottom: 10px;
        }

        .content p {
            margin: 5px 0;
        }

        .footer {
            border-top: 1px solid #000;
            padding-top: 450px;
            font-size: 10px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer .qr-code {
            width: 100px;
            height: 100px;
        }

        .footer .text {
            flex: 1;
            margin-left: 10px;
        }

        .footer .text p {
            margin: 5px 0;
        }

        .barcode {
            font-size: 10px;
            text-align: center;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="left">
                <strong>Docteur DEMO Jean</strong>
                <p>33 rue Alma Pro<br>67000 Strasbourg<br>Tél: 03 88 88 88 88</p>
            </div>
            <div class="right">
                <strong>Médecin générale</strong>
                <p>99700898214 - ADELI: 001086214</p>
                <p>Strasbourg, le Mercredi 30 Octobre 2024</p>
            </div>
        </div>

        <!-- Patient Information Box -->
        <div class="box">
            <div class="details">
                <p><strong>Nom de naissance :</strong> NESSI</p>
                <p><strong>Premier prénom de naissance :</strong> RUTH</p>
                <p><strong>Prénom(s) de naissance :</strong> RUTH ISABELLE</p>
                <p><strong>Date de naissance :</strong> 14/07/1977</p>
                <p><strong>Lieu de naissance (code INSEE) :</strong> 63220</p>
                <p><strong>Sexe :</strong> Féminin</p>
                <p><strong>N° matricule INS :</strong> 277076322082910</p>
                <p><strong>Type :</strong> INS-NIR</p>
                <p><strong>Adresse de messagerie sécurisée de l'usager :</strong></p>
                <p><strong></strong>  277076322082910@patient.mssante.fr</p>
            </div>
            <div class="qr-code"></div>
        </div>

        <!-- Prescription Content -->
        <div class="content">
            <strong>Mme RUTH DE VINCI, 47 ans</strong>
            <p><strong>1) Paracétamol 1 000 mg Comprimé (DOLIPRANE)</strong></p>
            <p>1 comprimé le matin, 1 comprimé le midi, 1 comprimé le soir pendant 5 jours</p>
            <p><strong>Nombre de produit :</strong> 1</p>
        </div>
        <table border="1" cellpadding="5">
        <tr>
            <th>Médicament</th>
            <th>Dosage</th>
            <th>Fréquence</th>
        </tr>
        @foreach ($medicaments as $medicament)
            <tr>
                <td>{{ $medicament['nom'] }}</td>
                <td>{{ $medicament['dose'] }}</td>
                <td>{{ $medicament['frequence'] }}</td>
            </tr>
        @endforeach
    </table>

    <p>Scannez le QR Code ci-dessous pour voir les détails :</p>


        <!-- Footer -->
        <div class="footer">
            <div class="qr-code"></div>
            <div class="text">
                <p>Le patient ou le ou les titulaire(s) de l'autorité parentale a (ont) accepté que je puisse consulter ce qui a été délivré OU exécuté sur la présente prescription : Oui</p>
                <p>Les données de la prescription sont transmises électroniquement à l'assurance maladie qui traite vos données dans le cadre de ses missions. Pour en savoir plus sur la gestion de vos données personnelles et pour exercer vos droits, reportez-vous à <a href="https://www.ameli.fr">https://www.ameli.fr</a></p>
                <p class="barcode">e-prescription: 0322JX52I4RTEWZHTPT</p>
            </div>
        </div>
    </div>
</body>
</html>