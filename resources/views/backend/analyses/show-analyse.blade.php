@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Détails de l'Analyse</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Type Analysee:</label>
                                <input type="text" class="form-control" value="{{ $analyse->type_analyse }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Prix de l'Analyse:</label>
                                <input type="text" class="form-control" value="{{ $analyse->prix_analyse }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Médecin:</label>
                                <input type="text" class="form-control" value="{{ $analyse->medecin->nom_medecin }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Patient:</label>
                                <input type="text" class="form-control" value="{{ $analyse->patient->nom_patient }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Date de l'Analyse:</label>
                                <input type="text" class="form-control" value="{{ $analyse->date_analyse }}" readonly>
                            </div>
                            <a href="{{ route('analyses.index') }}" class="btn btn-primary">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
