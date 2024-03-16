@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Créer un nouvel Examen</h2>
                            <form method="post" action="{{ route('examens.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label>Patient :</label>
                                    <select id="id_patient" name="id_patient" class="form-control" required>
                                        <option value="">Sélectionnez un patient</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->nom_patient }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Analyses :</label>
                                    <select id="id_analyse" name="id_analyse[]" class="form-control" multiple required>
                                        <option value="">Sélectionnez les analyses</option>
                                        @foreach ($analyses as $analyse)
                                            <option value="{{ $analyse->id }}">{{ $analyse->type_analyse }} ({{ $analyse->prix_analyse }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Créer Examen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
