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
                                <h3 class="card-title">Reçu de paiement </h3>
                            </div>
                            <div class="card-body print-content">
                                <h2><strong>Centre de santé de Teyaret</strong></h2>
                                <hr>
                                <h4><i>Reçu de paiement intervention</i></h4>
                                <p>Numéro d'intervention: {{ $intervention->id }}</p>
                                <p>Nom d'intervention: {{ $intervention->intervention }}</p>
                                <p>Prix d'intervention: {{ $intervention->prix_intervention }}</p>
                                <p>Spécialiste: {{ $intervention->specialiste->nom_specialite }}</p>
                                <p>Patient: {{ $intervention->patient->nom_patient }}</p>
                                <p>Date d'intervention: {{ $intervention->date_intervention }}</p>
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
