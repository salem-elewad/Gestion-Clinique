@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Modifier un Service</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.update', $service->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nom_service">Nom du Service</label>
                                    <input type="text" name="nom_service" class="form-control" value="{{ $service->nom_service }}">
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
