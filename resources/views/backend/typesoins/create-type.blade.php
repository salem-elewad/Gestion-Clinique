@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter un Type de Soins</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('type_soins.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Type de Soins:</label>
                                    <input type="text" name="type_soins" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
