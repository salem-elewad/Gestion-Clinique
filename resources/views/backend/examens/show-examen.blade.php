<!-- resources/views/backend/examens/show-examen.blade.php -->

@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Détails de l'Examen</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Patient :</label>
                                <input type="text" class="form-control" value="{{ $examen->patient->nom_patient }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>NNI :</label>
                                <input type="text" class="form-control" value="{{ $examen->patient->nni }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Cnam :</label>
                                <input type="text" class="form-control" value="{{ $examen->patient->cnam }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Numéro Tel :</label>
                                <input type="text" class="form-control" value="{{ $examen->patient->num_patient }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Prix Analyse :</label>
                                <input type="text" class="form-control" value="{{ $examen->analyse->prix_analyse }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Type Analyse :</label>
                                <input type="text" class="form-control" value="{{ $examen->analyse->type_analyse }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Date de l'Examen :</label>
                                <input type="text" class="form-control" value="{{ $examen->created_at }}" readonly>
                            </div>
                            <a href="{{ route('examens.index') }}" class="btn btn-primary">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
