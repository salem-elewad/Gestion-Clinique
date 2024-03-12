@extends('backend.layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Créer une Intervention</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('interventions.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="prix_intervention">Prix de l'intervention</label>
                                    <input type="text" class="form-control" id="prix_intervention" name="prix_intervention" placeholder="Prix d'intervention" required>
                                    @error('prix_intervention')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_specialiste">Spécialiste</label>
                                    <select class="form-control" name="id_specialiste" id="id_specialiste" required>
                                        @foreach($specialistes as $specialiste)
                                            <option value="{{ $specialiste->id }}">{{ $specialiste->nom_specialite }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_patient">Patient</label>
                                    <select class="form-control" name="id_patient" id="id_patient" required>
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->nom_patient }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="id_service">Service</label>
                                    <select class="form-control" name="id_service" id="id_service" required>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->nom_service }}</option>
                                        @endforeach
                                    </select>
                                </div>  <div class="form-group">
                                    <label for="date_intervention">Date d'intervention </label>
                                    <input type="date" name="date_intervention" class="form-control" placeholder="Date d'intervention" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Créer</button>
                                <a href="{{ route('interventions.index') }}" class="btn btn-secondary">Retour</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
