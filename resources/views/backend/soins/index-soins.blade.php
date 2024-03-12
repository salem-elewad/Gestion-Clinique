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
                                <h3 class="card-title">Tous les Soins</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('soins.create') }}">Ajouter</a>
                                        <br> <hr>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>Numero Soin</th>
                                            <th>Prix du Soin</th>
                                            <th>Type de Soin</th>
                                            <th>Patient</th>
                                            <th>Date de Soin</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($soins as $key => $soin)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $soin->id }}</td>
                                            <td>{{ $soin->prix_soins }}</td>
                                            <td>{{ $soin->type_soins }}</td>
                                            <td>{{ $soin->patient->nom_patient }}</td>
                                            <td>{{ $soin->date_soins }}</td>
                                            <td>
                                                <a href="{{ route('soins.show', $soin->id) }}" class="btn btn-sm btn-info" title="Détails"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="{{ route('soins.edit', $soin->id) }}" class="btn btn-sm btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                                                @can('delete-soins')
                                                <form action="{{ route('soins.destroy', $soin->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                @endcan
                                                <a href="{{ route('soins.print', $soin->id) }}" class="btn btn-sm btn-success" title="Imprimer"><i class="fa fa-print" aria-hidden="true"></i></a>

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
