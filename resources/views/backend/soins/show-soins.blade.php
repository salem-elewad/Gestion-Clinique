@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Détails du Soin</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Prix du Soin:</label>
                                    <p>{{ $soin->prix_soins }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Type de Soin:</label>
                                    <p>{{ $soin->type_soins }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Patient:</label>
                                    <p>{{ $soin->patient->nom_patient }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Date du Soin:</label>
                                    <p>{{ $soin->date_soins }}</p>
                                </div>
                                <a href="{{ route('soins.index') }}" class="btn btn-primary">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
