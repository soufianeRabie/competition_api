<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Training Catalogue 2024</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap');

        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f7fafc;
            color: #1a202c;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .cover-page {
            text-align: center;
            margin: 40px 0;
        }

        .cover-page h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #4c51bf;
        }

        .cover-page h2 {
            font-size: 1.8rem;
            margin-top: 10px;
            color: #5a67d8;
        }

        .cover-page p {
            color: #718096;
            font-size: 1.2rem;
        }

        .table-of-contents {
            margin: 40px 0;
        }

        .table-of-contents h2 {
            font-size: 2.2rem;
            font-weight: 600;
            color: #4c51bf;
            margin-bottom: 20px;
        }

        .table-of-contents ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .table-of-contents li {
            margin: 10px 0;
        }

        .table-of-contents a {
            color: #5a67d8;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        .table-of-contents a:hover {
            text-decoration: underline;
            color: #3b4fcb;
        }

        .content-page {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 30px 0;
        }

        .content-page h2 {
            font-size: 2.2rem;
            font-weight: 600;
            color: #4c51bf;
            margin-bottom: 30px;
        }

        .theme {
            margin-bottom: 30px;
        }

        .theme h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #4c51bf;
            margin-bottom: 15px;
        }

        .theme p {
            margin: 8px 0;
            font-size: 1.1rem;
        }

        .themes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .theme-card {
            background-color: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            margin-bottom: 20pxr;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .theme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .theme-plans {
            margin-top: 20px;
        }

        .theme-plans h4 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #4c51bf;
            margin-bottom: 10px;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .schedule-table th,
        .schedule-table td {
            padding: 8px 8px;
            text-align: left;
            border: 1px solid #e2e8f0;
        }

        .schedule-table th {
            background-color: #4c51bf;
            color: #fff;
            font-weight: 600;
        }

        .schedule-table tbody tr:nth-child(even) {
            background-color: #f7fafc;
        }

        .contact ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .contact ul li {
            margin: 10px 0;
            font-size: 1.1rem;
        }

        .contact ul li::before {
            content: "•";
            color: #4c51bf;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }


    </style>
</head>

<body>
<div class="container">
    <div class="cover-page">
        <h1>Annual Training Catalogue 2024</h1>
        <h2>Comprehensive Training Plans and Themes</h2>
        {{-- <img src="path/to/company-logo.png" alt="Company Logo" class="mx-auto my-4 w-32" /> --}}
        <p>Published on: 2024-05-23</p>
    </div>
    <div class="table-of-contents">
        <h2>Table of Contents</h2>
        <ul>
            <li><a href="#introducdtion">Introduction</a></li>
            <li><a href="#themes">List of Themes</a></li>
            <li><a href="#plans">Detailed Plans</a></li>
            <li><a href="#contact">Contact Information</a></li>
        </ul>
    </div>

    <div id="introduction" class="content-page">
            <h2>Introduction</h2>
            <p>Bienvenue dans notre Catalogue de Formation Annuel 2024. Ce catalogue est conçu pour offrir une vue d'ensemble complète des plans de formation et des thèmes proposés pour l'année à venir. Nous nous engageons à fournir des programmes de formation de haute qualité qui répondent aux besoins en constante évolution de nos participants. Explorez nos différentes sections pour découvrir les opportunités de développement professionnel et les compétences que vous pouvez acquérir pour exceller dans votre domaine. Nous espérons que ce catalogue vous aidera à planifier efficacement vos activités de formation pour l'année 2024.</p>

    </div>

    <div id="themes" class="content-page">
        <h2>Liste des Thèmes</h2>
        <div class="themes-grid">
            @foreach ($themes as $theme)
                <div class="theme-card">
                    <h3>{{ $theme->intitule_theme }}</h3>
                    <p><strong>Domaine :</strong> {{ $theme->domain->nom_domaine }}</p>
                    <p><strong>Statut du Domaine :</strong> {{ $theme->domain->status ? 'Actif' : 'Inactif' }}</p>
                    <p><strong>Durée :</strong> {{ $theme->durree_formation }} jours</p>
                    <p><strong>Statut :</strong> {{ $theme->status ? 'Actif' : 'Inactif' }}</p>
                    <div class="theme-plans">
                        <h4>Plans Détails</h4>
                        <table class="schedule-table">
                            <thead>
                            <tr>
                                <th>Exercice</th>
                                <th>Thème</th>
                                <th>Établissement</th>
                                <th>Nbr Jours</th>
                                <th>Participants Max</th>
                                <th>Coût Prévisionnel</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($theme->plans as $plan)
                                <tr>
                                    <td>{{ $plan->exercice }}</td>
                                    <td>{{ $plan->theme->intitule_theme }}</td>
                                    <td>{{ $plan->etablissement->nom_efp }}</td>
                                    <td>{{ $plan->nbjours }}</td>
                                    <td>{{ $plan->nbparticipantmaxi }}</td>
                                    <td>{{ $plan->cout_previsionnel }} DH</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div id="contact" class="content-page">
        <h2>Contact Information</h2>
        <p><strong>Email:</strong> hackaton@example.com</p>
        <p><strong>Phone:</strong> +123-456-7890</p>
        <p><strong>Office Locations:</strong></p>
        <ul>
            <li>Address 1, City, Country</li>
            <li>Address 2, City, Country</li>
        </ul>
    </div>

    <img src="{{ $qrCodeImage }}" type="application/pdf" width="100%" height="600px">
</div>
</body>
</html>
