@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Détails du medecin</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nom_medecin" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $Medecin->nom_medecin }}"
                                               readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $Medecin->phone }}" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
