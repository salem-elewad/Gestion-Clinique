@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
   <section class="content">
        <div class="row">
            <div class="col-lg-1">

            </div>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ajouter Medecin</h5>
                        </div>
                        <div class="card-body">
                        <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                            action="{{route('medecins.store')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nom Medecin : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nom_medecin" placeholder="Entrer Nom medecin" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Talephone</label>
                                    <div class="col-sm-10">
                                        <input type="" class="form-control" name="phone" placeholder="Entrer Numero Telephone" required>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Entrer</button>
                            </div>
                            </form>
                        </div>
                    </div>
        </div>
                    <div class="col-lg-1">

                    </div>
   </section>
@endsection
