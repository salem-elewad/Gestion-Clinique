@extends('backend.layouts.app')
@section('content')


  <!-- Content Wrapper. Contains page content -->
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
                     <ul>
                            @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                            <li>{{ $v->name }}</li>
                            @endforeach
                            @endif
                        </ul>

                      <a href="{{ route('roles.index') }}" class="btn btn-primary">Retour</a>
                    </div>
                  </div>
                </div>


            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
 </div>

@endsection
