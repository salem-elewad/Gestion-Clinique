<!-- resources/views/backend/consultations/stats-consultation.blade.php -->
@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Statistiques des consultations</h3>
                            </div>
                            <div class="card-body">
                                <div style="width: 100%; height: 400px;">
                                    <canvas id="consultationsChart" style="width: 100%; height: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        var months = {!! json_encode($months) !!};
        var counts = {!! json_encode($counts) !!};
        var totalPrices = {!! json_encode($totalPrices) !!};

        var ctx = document.getElementById('consultationsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Nombre de consultations',
                        data: counts,
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Prix total',
                        data: totalPrices,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 2,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
