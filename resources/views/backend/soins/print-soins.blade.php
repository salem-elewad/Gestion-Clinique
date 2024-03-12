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
                                <h3 class="card-title">le reçu de paiement soin</h3>
                            </div>
                            <div class="card-body print-content">
                                <h4>Numéro de soin: {{ $soin->id }}</h4>
                                <p>Prix de consultation: {{ $soin->prix_soins}}</p>
                                <p>Type soin : {{ $soin->type_soins }}</p>
                                <p>Patient: {{ $soin->patient->nom_patient }}</p>
                                <p>Date: {{ $soin->date_soins }}</p>
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
