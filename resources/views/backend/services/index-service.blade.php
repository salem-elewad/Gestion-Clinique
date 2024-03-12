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
                            <h3 class="card-title">Tous les Services</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('services.create') }}">Ajouter</a>
                                    <br> <hr>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Nom du Service</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $key => $service)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $service->nom_service }}</td>
                                        <td>
                                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer"><i class="fas fa-trash-alt"></i></button>
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
