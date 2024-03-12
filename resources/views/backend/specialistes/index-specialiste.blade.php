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
                            <h3 class="card-title">Tous les Spécialistes</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('specialistes.create') }}">Ajouter</a>
                                    <br> <hr>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Nom du Spécialite</th>
                                        <th>Médecin</th>
                                        <th>Service</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($specialistes as $key => $specialiste)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $specialiste->nom_specialite }}</td>
                                        <td>{{ $specialiste->medecin->nom_medecin }}</td>
                                        <td>{{ $specialiste->service->nom_service }}</td>
                                        <td>
                                            <a href="{{ route('specialistes.show', $specialiste->id) }}" class="btn btn-sm btn-info" title="Détails"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('specialistes.edit', $specialiste->id) }}" class="btn btn-sm btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('specialistes.destroy', $specialiste->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
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
