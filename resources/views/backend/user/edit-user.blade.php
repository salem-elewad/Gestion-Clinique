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
                            <h5 class="card-title">Modifier Utilisateur</h5>
                        </div>
                        <div class="card-body">
                              {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="Entrer le nom" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email Utilisateur</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" placeholder="Entrer l'email" value="{{ $user->email }}">
                                    </div>
                                </div>


                                    <div class="row mg-b-20">
                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label>Mot de passe <span class="tx-danger">*</span></label>
                                            {!! Form::password('password', array('class' => 'form-control','required')) !!}
                                        </div>

                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label> Confirm <span class="tx-danger">*</span></label>
                                            {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                                        </div>
                                    </div>


                                    <div class="row mg-b-20">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Role</strong>
                                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple'))
                                                !!}
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Enregistrer</button>
                            </div>
                            </form>
                        </div>
                    </div>
        </div>
                    <div class="col-lg-1">

                    </div>
   </section>
@endsection
