@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Détails du Spécialiste</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nom du Spécialite:</label>
                                <p>{{ $specialiste->nom_specialite }}</p>
                            </div>
                            <div class="form-group">
                                <label>Médecin:</label>
                                <p>{{ $specialiste->medecin->nom_medecin}}</p>
                            </div>
                            <div class="form-group">
                                <label>Service:</label>
                                <p>{{ $specialiste->service->nom_service }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
