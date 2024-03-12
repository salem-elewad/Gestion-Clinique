@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Détails du Patient</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nom du Patient:</th>
                                        <td>{{ $patient->nom_patient }}</td>
                                    </tr>
                                    <tr>
                                        <th>CNAM:</th>
                                        <td>{{ $patient->cnam }}</td>
                                    </tr>
                                    <tr>
                                        <th>NNI:</th>
                                        <td>{{ $patient->nni }}</td>
                                    </tr>
                                    <tr>
                                        <th>Service:</th>
                                        <td>{{ $patient->service->nom_service }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
