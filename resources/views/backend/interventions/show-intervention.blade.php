@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Détails de l'intervention</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Intervention :</th>
                                    <td>{{ $intervention->intervention }}</td>
                                </tr>
                                <tr>
                                    <th>Spécialiste :</th>
                                    <td>{{ $intervention->specialiste->nom_specialite }}</td>
                                </tr>
                                <tr>
                                    <th>Patient :</th>
                                    <td>{{ $intervention->patient->nom_patient }}</td>
                                </tr>
                                <tr>
                                    <th>Service :</th>
                                    <td>{{ $intervention->service->nom_service }}</td>
                                </tr>
                                <tr>
                                    <th>Utilisateur :</th>
                                    <td>{{ $intervention->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date d'intervention :</th>
                                    <td>{{ $intervention->date_intervention }}</td>
                                </tr>
                                <tr>
                                    <th>Prix de l'intervention :</th>
                                    <td>{{ $intervention->prix_intervention }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
