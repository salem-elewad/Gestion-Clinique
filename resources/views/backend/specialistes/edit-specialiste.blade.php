@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Modifier le Spécialiste</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('specialistes.update', $specialiste->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nom du Spécialiste:</label>
                                    <input type="text" name="nom_specialite" class="form-control" value="{{ $specialiste->nom_specialite }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Médecin:</label>
                                    <select name="id_medecin" class="form-control" required>
                                        @foreach($medecins as $medecin)
                                        <option value="{{ $medecin->id }}" {{ $specialiste->id_medecin == $medecin->id ? 'selected' : '' }}>{{ $medecin->nom_medecin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Service:</label>
                                    <select name="id_service" class="form-control" required>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ $specialiste->id_service == $service->id ? 'selected' : '' }}>{{ $service->nom_service }}</option>
                                        @endforeach
                                    </select>
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
