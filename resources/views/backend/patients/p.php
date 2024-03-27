<!-- resources/views/backend/patients/print.blade.php -->

@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Rapport d'Analyse du Patient: {{ $patient->nom_patient }}</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Type d'Analyse</th>
                                <th>Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patient->analyses as $analyse)
                            <tr>
                                <td>{{ $analyse->type_analyse }}</td>
                                <td>{{ $analyse->prix_analyse }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><strong>{{ $patient->analyses->sum('prix_analyse') }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
