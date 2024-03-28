<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Patients</title>
    <style>
        /* Styles CSS pour la mise en page de l'impression */
        @page {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 200px;
            height: auto;
        }
        .header h1 {
            margin-top: 10px;
        }
        .patient-info {
            margin-bottom: 20px;
        }
        .patient-info p {
            margin: 5px 0;
        }
        .results-table {
            width: 100%;
            border-collapse: collapse;
        }
        .results-table th, .results-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .results-table th {
            background-color: #f2f2f2;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
        .print-button button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('backend/dist/img/essava.jpeg') }}" alt="Clinique Essava">
            <h1>Clinique Essava</h1>
        </div>
        <div class="patient-info">
            <p><strong>Patient:</strong> {{ $patient->nom_patient }}</p>
        </div>
        <table class="results-table">
            <thead>
                <tr>
                    <th>Type Analyse</th>
                    <th>Résultat</th>
                    <th>Unités</th>
                    <th>Valeur Normale</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patient->resultats as $resultat)
                <tr>
                    <td>{{ $resultat->analyse->type_analyse }}</td>
                    <td>{{ $resultat->resultat }}</td>
                    <td>{{ $resultat->analyse->unites }}</td>
                    <td>{{ $resultat->analyse->valeur_normale }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="print-button">
            <button onclick="window.print()">Imprimer</button>
        </div>
    </div>
</body>
</html>
