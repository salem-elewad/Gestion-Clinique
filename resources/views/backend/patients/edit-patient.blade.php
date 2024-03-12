@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Modifier un Patient</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nom_patient">Nom du Patient</label>
                                    <input type="text" name="nom_patient" class="form-control" value="{{ $patient->nom_patient }}">
                                </div>
                                <div class="form-group">
                                    <label for="cnam">CNAM</label>
                                    <input type="text" name="cnam" class="form-control" value="{{ $patient->cnam }}">
                                </div>
                                <div class="form-group">
                                    <label for="nni">NNI</label>
                                    <input type="text" name="nni" class="form-control" value="{{ $patient->nni }}">
                                </div>
                                <div class="form-group">
                                    <label for="nom_patient">Nom du Patient</label>
                                    <input type="text" name="num_patient" class="form-control" value="{{ $patient->num_patient }}">
                                </div>
                                <div class="form-group">
                                    <label for="id_service">Service</label>
                                    <select name="id_service" class="form-control">
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ $patient->id_service == $service->id ? 'selected' : '' }}>{{ $service->nom_service }}</option>
                                        @endforeach
                                    </select>
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
