@extends('backend.layouts.app')

@section('css')
    <!-- Styles spécifiques à la page -->
    <style>
        .print-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
        }

        .card-header {
            text-align: center;
            padding: 20px;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 80px; /* Ajustez la taille du logo selon vos besoins */
        }

        .cabinet-details {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .cabinet-details div {
            width: 48%; /* Ajustez la largeur selon vos besoins */
        }

        .cabinet-details div p {
            margin: 0;
        }

        .card-body {
            text-align: center;
            padding: 40px;
        }

        .card-body h5 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card-body table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .card-body th,
        .card-body td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .card-body th {
            background-color: #f2f2f2;
        }

        /* Styles spécifiques pour l'impression */
        @media print {
            .main-header {
                display: none !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card print-page">
                    <div class="card-header">
                        <div class="logo-container">
                            <img src="{{ asset('backend/dist/img/essava.jpeg') }}" alt="Logo Cabinet Médical Essava">
                        </div>
                    </div>
                    <div class="cabinet-details">
                        <div>
                            <p>Adresse du Cabinet &thinsp; &thinsp; &thinsp; &thinsp; &thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;  عنوان العيادة</p>
                            <p>Téléphone du Cabinet</p>
                        </div>
                        <div>
                            <p>عنوان العيادة</p>
                            <p>هاتف العيادة</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Détails de l'Examen</h5>
                        <table>
                            <tr>
                                <th>Patient</th>
                                <td>{{ $examen->patient->nom_patient }}</td>
                            </tr>
                            <tr>
                                <th>Prix Analyse</th>
                                <td>{{ $examen->analyse->prix_analyse }}</td>
                            </tr>
                            <!-- Ajoutez d'autres champs d'examen ici -->
                        </table>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary btn-print" onclick="window.print()">Imprimer</button>
                        <a href="{{ route('examens.index') }}" class="btn btn-secondary btn-cancel">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
