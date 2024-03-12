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
                  <h3 class="card-title">Tous les medecins</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('medecins.create') }}">Ajouter</a>
                        <br> <hr>
                    </div>
                    <thead>
                    <tr>
                        <tr>
                            <th>Index</th>
                            <th>Nom medecin</th>
                            <th>Telephone</th>
                            <th>Action</th>
                          </tr>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($medecins as $key => $row )
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $row->nom_medecin }}</td>
                          <td>{{ $row->phone }}</td>

                        </td>
                    <td>

                        <a href="{{ route('medecins.show', $row->id) }}" class="btn btn-sm btn-info"
                            title="Afficher"><i class="fa fa-eye" aria-hidden="true"></i></a>


                        <a href="{{ route('medecins.edit', $row->id) }}" class="btn btn-sm btn-warning"
                            title="Modifier"><i class="fas fa-edit"></i></a>

                            <form action="{{ route('medecins.destroy', $row->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></button>
                            </form>

                    </td>
                </tr>
                    @endforeach

                </tbody>
                
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
