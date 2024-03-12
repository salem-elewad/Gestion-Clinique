@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Modifier le Soin</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('soins.update', $soin->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="prix_soins">Prix du Soin</label>
                                        <input type="number" name="prix_soins" class="form-control" id="prix_soins" value="{{ $soin->prix_soins }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_soins">Type de Soin</label>
                                        <input type="string" name="type_soins" class="form-control" id="type_soins" value="{{ $soin->type_soins }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="id_patient">Patient</label>
                                        <select name="id_patient" id="id_patient" class="form-control">
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}" @if ($patient->id == $soin->id_patient) selected @endif>{{ $patient->nom_patient }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_soins">Date du Soin</label>
                                        <input type="date" name="date_soins" class="form-control" id="date_soins" value="{{ $soin->type_soins  }}">
                                    </div>
                 
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
