@extends('backend.layouts.app')
@section('content')

   <div class="content-wrapper" style="background-image: url('{{ asset('backend/dist/img/DRMijMbWAAI6nA3.jpg') }}')">
      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::to('home') }}">Acceuil</a></li>
              <li class="breadcrumb-item active">Clinique Essava</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                      <h6><b> Consultations ({{ $currentMonthName }}): {{ $consultations }}</b></h6>
                       <h6><b>Total Prix ({{ $currentMonthName}}): {{ $totalPrixConsultation }} MRU</b></h6>
                    <hr>

                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @can('stats-consultation')     <a class="small text-white stretched-link"  href="stats-consultation"><b>Voir les details</b></a> @endcan
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-dark text-white mb-4">
                    <div class="card-body">

                     <h6><b>Interventions ({{ $currentMonthName }}): {{ $interventions }}</b></h6>
                        <h6><b>Total Prix ({{ $currentMonthName}}): {{ $totalPrixIntervention }} MRU</b></h6>
                        <hr>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @can('stats-intervention')          <a class="small text-white stretched-link" href="stats-intervention"> <b>Voir les details</b></a> @endcan
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">

                        <h6><b>Analyses ({{ $currentMonthName }}): {{ $analyses }}</b></h6>
                        <h6><b>Total Prix ({{ $currentMonthName}}): {{ $totalPrixAnalyse }} MRU</b></h6>
                        <hr>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @can('stats-analyse')            <a class="small text-white stretched-link" href="stats-analyse"><b>Voir les details</b></a> @endcan
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">

                        <h6><b>Soins ({{ $currentMonthName }}): {{ $soins }}</b></h6>
                        <h6><b>Total Prix ({{ $currentMonthName}}): {{ $totalPrixSoin }} MRU</b></h6>
                        <hr>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @can('stats-soins')             <a class="small text-white stretched-link" href="stats-soins"><b>Voir les details</b></a> @endcan
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>



        </div>
          <!-- /.col -->
        </div>
        <div class="card" style="max-width: 500px;">
            <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-0">Statistiques de l'hopital</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <canvas id="barChart"></canvas>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        <b>Total Médecins: {{ $count_medecins }}</b>
                    </div>
                    <div class="col-md-4">
                        <b>Total Spécialistes: {{ $count_specialistes }}</b>
                    </div>
                    <div class="col-md-4">
                        <b>Total Services: {{ $count_services }}</b>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById('barChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Médecins', 'Spécialistes', 'Services'],
                        datasets: [{
                            label: 'Nombre',
                            data: [{{ $count_medecins }}, {{ $count_specialistes }}, {{ $count_services }}],
                            backgroundColor: ['#FE6F5E', '#00CCCC', '#FFEF00'],
                        }]
                    },
                    options: {}
                });
            });
        </script>

        <!-- /.row -->


        <!-- /.row -->

        <!-- Main row -->

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
