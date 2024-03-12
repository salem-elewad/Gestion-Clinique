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
                                <h4><strong>Reçu de paiement consultation</strong></h4>
                                <p>Numéro de consultation : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $consultation->id }}</p>
                                <p>Prix de consultation : {{ $consultation->prix_consultation }}</p>
                                <p>Médecin : {{ $consultation->medecin->nom_medecin }}</p>
                                <p>Patient : {{ $consultation->patient->nom_patient }}</p>
                                <p>Service : {{ $consultation->patient->service->nom_service }}</p>
                                <p>Date : {{ $consultation->created_at }}</p>
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
    <script>

    </script>

@endsection
