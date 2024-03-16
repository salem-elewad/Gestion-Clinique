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
                            <h3 class="card-title">Tous les Patients</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('patients.create') }}">Ajouter</a>
                                    <br> <hr>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Nom du Patient</th>
                                         <th>Type analyse</th>
                                         <th>Prix analyse</th>
                                         <th>Totale</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $key => $patient)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $patient->nom_patient }}</td>
                                        <td>
                                            @foreach($patient->analyses as $analyse)
                                                {{ $analyse->type_analyse }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($patient->analyses as $analyse)
                                                {{ $analyse->prix_analyse }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $total = 0;
                                                foreach($patient->analyses as $analyse) {
                                                    $total += $analyse->prix_analyse;
                                                }
                                                echo $total;
                                            @endphp
                                        </td>

                                        <td>
                                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-sm btn-info"
                                                title="Afficher"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                <td>
                                                    <!-- Autres boutons d'action -->
                                                    <a href="{{ route('resultat.index') }}" class="btn btn-sm btn-primary" title="Voir les résultats"><i class="fas fa-poll"></i> Voir les résultats</a>
                                                </td> 

                                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning" title="Modifier"><i class="fas fa-edit"></i></a>
                                            @can('delete-patient')
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                          
                       
                                            @endcan
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
