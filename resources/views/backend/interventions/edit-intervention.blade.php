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
                            <h3 class="card-title">Modifier l'Intervention</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('interventions.update', $intervention->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="prix_intervention">Prix de l'intervention</label>
                                    <input type="text" class="form-control" id="prix_intervention" name="prix_intervention" value="{{ $intervention->prix_intervention }}">
                                    @error('prix_intervention')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_specialiste">Spécialiste</label>
                                    <select class="form-control" name="id_specialiste" id="id_specialiste" required>
                                        @foreach($specialistes as $specialiste)
                                            <option value="{{ $specialiste->id }}" {{ $specialiste->id === $intervention->id_specialiste ? 'selected' : '' }}>{{ $specialiste->nom_specialite }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_patient">Patient</label>
                                    <select class="form-control" name="id_patient" id="id_patient" required>
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}" {{ $patient->id === $intervention->id_patient ? 'selected' : '' }}>{{ $patient->nom_patient }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="id_service">Service</label>
                                    <select class="form-control" name="id_service" id="id_service" required>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}" {{ $service->id === $intervention->id_service ? 'selected' : '' }}>{{ $service->nom_service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_intervention">Date d'intervention</label>
                                    <input type="date" name="date_intervention" class="form-control" id="date_intervention" value="{{ $intervention->date_intervention  }}">

                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
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
