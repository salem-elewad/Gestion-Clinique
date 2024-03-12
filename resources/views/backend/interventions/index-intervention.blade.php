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
                                <h3 class="card-title">Toutes les Interventions</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('interventions.create') }}">Ajouter</a>
                                        <br> <hr>
                                    </div>
                                    <thead>
                                        <tr>
                                        <th>Index</th>
                                        <th>Prix de l'intervention</th>
                                        <th>Spécialiste</th>
                                        <th>Patient</th>
                                        <th>Service</th>
                                        <th>Date d'intervention</th>

                                        <th  style="width: 8rem;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($interventions as $key => $intervention)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $intervention->prix_intervention }}</td>
                                            <td>{{ $intervention->specialiste->nom_specialite }}</td>
                                            <td>{{ $intervention->patient->nom_patient }}</td>
                                            <td>{{ $intervention->service->nom_service }}</td>
                                            <td>{{ $intervention->date_intervention }}</td>

                                            <td>
                                                <a href="{{ route('interventions.show', $intervention->id) }}" class="btn btn-sm btn-info" title="Détails"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('interventions.edit', $intervention->id) }}" class="btn btn-sm btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                                                @can('delete-intervention')
                                                <form action="{{ route('interventions.destroy', $intervention->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>

                                                @endcan
                                                <a href="{{ route('intervention.print', $intervention->id) }}" class="btn btn-sm btn-success" title="Imprimer"><i class="fa fa-print" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

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
