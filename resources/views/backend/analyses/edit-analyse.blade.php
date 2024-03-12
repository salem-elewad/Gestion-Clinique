<!-- edit-analyse.blade.php -->

@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Modifier une Analyse</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('analyses.update', $analyse->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Type analyse :</label>
                                    <input type="text" name="type_analyse" class="form-control" value="{{ $analyse->type_analyse }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Prix de l'Analyse :</label>
                                    <input type="number" name="prix_analyse" class="form-control" value="{{ $analyse->prix_analyse }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Médecin :</label>
                                    <select name="id_medecin" class="form-control" required>
                                        <option value="">Sélectionnez un médecin</option>
                                        @foreach ($medecins as $medecin)
                                        <option value="{{ $medecin->id }}" {{ $medecin->id === $analyse->id_medecin ? 'selected' : '' }}>{{ $medecin->nom_medecin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Patient :</label>
                                    <select name="id_patient" class="form-control" required>
                                        <option value="">Sélectionnez un patient</option>
                                        @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}" {{ $patient->id === $analyse->id_patient ? 'selected' : '' }}>{{ $patient->nom_patient }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_analyse">Date d'analyse</label>
                                    <input type="date" name="date_analyse" class="form-control" id="date_analyse" value="{{ $analyse->date_analyse  }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
