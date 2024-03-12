@extends('backend.layouts.app')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tous les Utilisateurs</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">Ajouter</a>
                        <br> <hr>
                </div>
                    <thead>
                    <tr>
                        <tr>
                            <th>Index</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $key => $user )
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                    </td>
                    <td class="table-actions">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info" title="Détails"><i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"
                                title="Modifier"><i class="fas fa-edit"></i><i class="las la-pen"></i></a>


                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></button>

                        </form>

                    </td>
                </tr>
                    @endforeach

                </tbody>
                    <tfoot>
                        <tr>
                            <th>Index</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
 </div>

@endsection
