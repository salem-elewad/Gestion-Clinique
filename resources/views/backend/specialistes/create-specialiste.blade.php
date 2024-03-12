@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un Spécialiste</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('specialistes.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nom du Spécialite:</label>
                                    <input type="text" name="nom_specialite" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Médecin:</label>
                                    <select name="id_medecin" class="form-control" required>
                                        @foreach($medecins as $medecin)
                                        <option value="{{ $medecin->id }}">{{ $medecin->nom_medecin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Service:</label>
                                    <select name="id_service" class="form-control" required>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->nom_service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
