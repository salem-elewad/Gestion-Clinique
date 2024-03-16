<!-- resources/views/backend/examens/index-examen.blade.php -->

@extends('backend.layouts.app')

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Toutes les Examens</h3>
                        </div>
                        <div class="card-body">
                            <div class="pull-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('examens.create') }}">Ajouter</a>
                                <br><hr>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
       <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>type analyse</th>
                <th>Prix Analyse</th>
              
                <!-- Ajoutez d'autres colonnes si nécessaire -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($examens as $examen)
            <tr>
                <td>{{ $examen->id }}</td>
                <td>{{ $examen->patient->nom_patient }}</td>
            
                <td>{{ optional($examen->analyse)->type_analyse }}</td>

               
                <td>{{ $examen->created_at }}</td>
                <!-- Ajoutez d'autres colonnes si nécessaire -->
                <td>
                    <a href="{{ route('examens.show', $examen->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('examens.edit', $examen->id) }}" class="btn btn-warning">Modifier</a>
                    @can('delete-examen')
                    <form action="{{ route('examens.destroy', $examen->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet examen?')">Supprimer</button>
                    </form>
                    @endcan
                    <a href="{{ route('examen.print', $examen->id) }}" class="btn btn-sm btn-success" title="Imprimer"><i class="fa fa-print" aria-hidden="true"></i></a>

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
