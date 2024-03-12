@extends('backend.layouts.app')
@section('content')

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
@csrf
<!-- row -->
<div class="content-wrapper">
    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
              <h5 class="card-title text-primary">{{ $role->name }} Permission</h5>
                    <br> <hr>
                    <li>
                        <label>Nom du rôle:</label>
                        <input type="text" name="name" value="{{ $role->name }}" class="form-control">

                        <label>Permissions:</label>
                        @foreach($permission as $value)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    {{ $value->name }}
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </li>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </section>
</div>
@endsection
