@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Créer une nouvelle consultation</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('consultations.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="prix_consultation">Prix de consultation</label>
                                        <input type="text" name="prix_consultation" class="form-control" placeholder="Prix de consultation" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_medecin">Médecin</label>
                                        <select name="id_medecin" class="form-control" required>
                                            <option value="">Sélectionner un médecin</option>
                                            @foreach($medecins as $medecin)
                                            <option value="{{ $medecin->id }}">{{ $medecin->nom_medecin }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_patient">Patient</label>
                                        <select name="id_patient" class="form-control" required>
                                            <option value="">Sélectionner un patient</option>
                                            @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->nom_patient }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_consultation">Date de consultation</label>
                                        <input type="date" name="date_consultation" class="form-control" placeholder="Date de consultation" required>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        <a href="{{ route('consultations.index') }}" class="btn btn-default">Annuler</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
