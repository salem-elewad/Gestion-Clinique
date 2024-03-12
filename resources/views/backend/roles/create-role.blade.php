@extends('backend.layouts.app')
@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>خطا</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="content-wrapper">
    <section class="content">
         <div class="row">
             <div class="col-lg-1">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
             </div>
                 <div class="col-lg-10">
                     <div class="card">
                         <div class="card-header">
                             <h5 class="card-title">Ajouter des roles</h5>
                             <div class="card-body">
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                     @csrf
                                    <li>
                                    @foreach($permission as $value)
                                    <label
                                        style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>

                                    @endforeach
                                    </li>
                             </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                            </div>

                     </div>
                 </div>
         </div>
        </div>

@endsection
