@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Modifier un Type de Soins</h3>
                        </div>
                        <div class="card-body">
                                <form action="{{ route('typesoins.update', $typeSoins->id) }}" method="POST">

                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Type de Soins:</label>
                                    <input type="text" name="type_soins" class="form-control" value="{{ $typeSoins->type_soins }}" required>
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
