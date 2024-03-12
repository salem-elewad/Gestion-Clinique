@extends('backend.layouts.app')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tous les roles</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">Ajouter</a>
                            <br> <hr>
                    </div>
                    <thead>
                    <tr>
                        <tr>
                            <th>Index</th>
                            <th>Nom</th>
                            <th>Action</th>
                          </tr>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($roles as $key => $row )
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $row->name }}</td>
                    </td>
                    <td class="table-actions">

                        <a href="{{ route('roles.show', $row->id) }}" class="btn btn-sm btn-info" title="Détails"><i class="fa fa-eye" aria-hidden="true"></i>
                        </a>

                        <a class="btn btn-warning btn-sm"
                        href="{{ route('roles.edit', $row->id) }}"><i class="fas fa-edit"> </i></a>



                        <form action="{{ route('roles.destroy', $row->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>

                    </td>
                </tr>
                    @endforeach

                </tbody>
                    <tfoot>
                        <tr>
                            <th>Index</th>
                            <th>Nom</th>
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
