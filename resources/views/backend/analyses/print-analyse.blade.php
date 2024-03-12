@extends('backend.layouts.app')

@section('content')
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .print-content, .print-content * {
            visibility: visible;
        }
        .print-content {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Reçu de paiement</h3>
                            </div>
                            <div class="card-body print-content">
                                <h2><strong>Centre de santé de Teyaret</strong></h2>
                                <hr>
                                <h4><i>Reçu de paiement d'analyse</i></h4>
                                <p><b>Numéro d'analyse: {{ $analyse->id }}</b></p>
                                <p><b>Numéro d'analyse: {{ $analyse->type_analyse }}</b></p>
                                <p>Prix d'analyse: {{ $analyse->prix_analyse }}</p>
                                <p>Médecin: {{ $analyse->medecin->nom_medecin }}</p>
                                <p>Patient: {{ $analyse->patient->nom_patient }}</p>
                                <p>Date d'analyse: {{ $analyse->date_analyse }}</p>
                                <!-- Ajoutez le contenu supplémentaire que vous souhaitez imprimer -->
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="window.print()">Imprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
