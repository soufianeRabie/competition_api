<!-- resources/views/emails/email-update-catalogue.blade.php -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mise à Jour du Catalogue de Formation</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap');

        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f7fafc;
            color: #1a202c;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .email-header h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #4c51bf;
        }

        .email-body {
            font-size: 1rem;
            line-height: 1.5;
            color: #1a202c;
        }

        .email-body p {
            margin-bottom: 20px;
        }

        .email-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #718096;
        }

        .email-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #4c51bf;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
        }

        .email-button:hover {
            background-color: #5a67d8;
        }

        .qr-code-container {
            text-align: center; /* Center the content horizontally */
        }

        .qr-code {
            display: inline-block;
            margin: 20px auto; /* Center the QR code vertically */
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h1>Mise à Jour du Catalogue de Formation 2024</h1>
    </div>
    <div class="email-body">
        <p>Bonjour, </p>
        <p>Nous sommes ravis de vous informer que le Catalogue de Formation 2024 a été mis à jour. Vous y trouverez des
            plans de formation détaillés, des thèmes variés et des informations importantes pour vos futurs projets de
            formation.</p>
        <p>Vous pouvez accéder au catalogue mis à jour en cliquant sur le lien ci-dessous :</p>
        <p style="text-align: center;">
            <a href="{{ $catalogueUrl }}" class="email-button">Voir le Catalogue Mis à Jour</a>
        </p>
        <p>Ou en scannant le QR code suivant :</p>
        <div class="qr-code-container">
            <img src="{{ $qrCodeUrl }}" type="application/pdf" class="qr-code">
        </div>
        <p>Nous vous remercions de votre confiance et restons à votre disposition pour toute question ou information
            supplémentaire.</p>
        <p>Cordialement,</p>
        <p>L'équipe de Formation</p>
    </div>
    <div class="email-footer">
        <p>Pour toute assistance, veuillez nous contacter à l'adresse suivante : <a href="mailto:hackaton@example.com">hackaton@example.com</a></p>
    </div>
</div>
</body>
</html>
