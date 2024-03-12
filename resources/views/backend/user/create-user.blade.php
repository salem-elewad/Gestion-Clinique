@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
   <section class="content">
        <div class="row">

                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ajouter Utilisateur</h5>
                        </div>
                        <div class="card-body">

                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                action="{{route('users.store')}}" method="post">
                {{csrf_field()}}
                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label>Nom<span class="tx-danger">*</span></label>
                        <input class="form-control form-control-sm mg-b-20"
                            data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>Email <span class="tx-danger">*</span></label>
                        <input class="form-control form-control-sm mg-b-20"
                            data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                    </div>
                </div>



            <div class="row mg-b-20">
                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label>Mot de passe<span class="tx-danger">*</span></label>
                    <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                        name="password" required="" type="password">
                </div>

                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                    <label>confirmer mot de passe: <span class="tx-danger">*</span></label>
                    <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                        name="confirm-password" required="" type="password">
                </div>
            </div>



            <div class="row mg-b-20">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        {!! Form::select('roles_name[]', $roles,[], ['class' => 'form-control','multiple']) !!}
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">submit</button>
            </div>
                                </div>
                    </div>
                            </form>
                        </div>
                    </div>
        </div>

   </section>
@endsection
