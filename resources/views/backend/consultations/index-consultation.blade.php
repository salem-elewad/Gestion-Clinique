@extends('backend.layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <style>
    .table-actions {
        width: 200px; /* Ajustez la largeur selon vos besoins */
      }

      .table-actions a {
        display: inline-block;
        margin-right: 5px; /* Espacement entre les liens */
      }
</style>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Toutes les Consultations</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('consultations.create') }}">Ajouter</a>
                                        <br> <hr>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>Numéro de consultation</th>
                                            <th>Prix de consultation</th>
                                            <th>Médecin</th>
                                            <th>Patient</th>
                                            <th>Date </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($consultations as $key => $consultation)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $consultation->id }}</td>
                                            <td>{{ $consultation->prix_consultation }}</td>
                                            <td>{{ $consultation->medecin->nom_medecin}}</td>
                                            <td>{{ $consultation->patient->nom_patient }}</td>
                                            <td>{{ $consultation->date_consultation }}</td>
                                            <td class="table-actions">
                                                <a href="{{ route('consultations.show', $consultation->id) }}" class="btn btn-sm btn-info" title="Détails"><i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-sm btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                                              @can('delete-consultation')
                                                <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                @endcan
                                                <a href="{{ route('consultations.print', $consultation->id) }}" class="btn btn-sm btn-success" title="Imprimer"><i class="fa fa-print" aria-hidden="true"></i>
                                                </a>
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
