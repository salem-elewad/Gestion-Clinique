@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails de la consultation</h3>
                            </div>
                            <div class="card-body">
                                <p>Numéro de consultation : {{ $consultation->id }}</p>
                                <p>Prix de consultation : {{ $consultation->prix_consultation }}</p>
                                <p>Médecin : {{ $consultation->medecin->nom_medecin }}</p>
                                <p>Patient : {{ $consultation->patient->nom_patient }}</p>
                                <p>Service : {{ $consultation->patient->service->nom_service }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-primary">Modifier</a>
                                <a href="{{ route('consultations.index') }}" class="btn btn-default">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
