<!-- resources/views/backend/patients/print.blade.php -->

@extends('backend.layouts.app')

@section('content')

<style>
    @media print {
        /* Masquer les éléments qui ne doivent pas être imprimés */
        body * {
            visibility: hidden;
        }
        #printable-content, #printable-content * {
            visibility: visible;
        }
        /* Styles pour le contenu imprimable */
        #printable-content {
            position: absolute;
            left: 0;
            top: 0;
        }
        /* Style de la fiche imprimée */
        .printable-sheet {
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            font-family: Arial, sans-serif;
        }
        .printable-sheet h1 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .printable-sheet table {
            width: 100%;
            border-collapse: collapse;
        }
        .printable-sheet th, .printable-sheet td {
            border-top: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .printable-sheet th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        /* Ajouter une bordure inférieure à chaque ligne sauf à la dernière */
        .printable-sheet tbody tr:not(:last-child) {
            border-bottom: 1px solid #ccc;
        }
        /* Styles pour l'en-tête */
        .printable-sheet-header {
            margin-bottom: 20px;
        }
        .printable-sheet-header img {
            max-width: 200px;
            margin-bottom: 10px;
        }
        .printable-sheet-header h2 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
        }
        .printable-sheet-header h3 {
            margin-top: 0;
            font-size: 18px;
            color: #555;
        }
        /* Style pour le bouton d'impression */
        .print-button {
            display: none;
        }
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div id="printable-content" class="printable-sheet">
                        <div class="printable-sheet-header">
                            <!-- Logo de la clinique centré -->
                            <div style="text-align: center;">
                                <img src="{{ asset('backend/dist/img/essava.jpeg') }}" alt="Logo Clinique">
                            </div>
                        </div>
                        <!-- Nom de la clinique -->
                        <h2>Clinique Essava</h2>
                        <!-- Nom du patient -->
                        <h3>Patient: {{ $patient->nom_patient }}</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Type d'Analyse</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patient->analyses as $analyse)
                                <tr>
                                    <td>{{ $analyse->type_analyse }}</td>
                                    <td>{{ $analyse->prix_analyse }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong>{{ $patient->analyses->sum('prix_analyse') }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="print-button" onclick="window.print()">Imprimer</button>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
