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
                                <h5 class="card-title">Modifier medecin</h5>
                            </div>
                            <div class="card-body">
                                <form class="parsley-style-1" id="editForm" autocomplete="off" name="editForm"
                                      action="{{ route('medecins.update', ['medecin' => $edit->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="nom_medecin" class="col-sm-2 col-form-label">Nom Medecin</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nom_medecin"
                                                   value="{{ $edit->nom_medecin }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cnam" class="col-sm-2 col-form-label">Telephone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{ $edit->phone }}" required>
                                        </div>
                                    </div>
                                  

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
