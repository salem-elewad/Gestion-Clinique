@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Résultats du Patient: {{ $patient->nom_patient }}</h1>
                    <h2>Types d'Analyses:</h2>
                    <form action="{{ route('patients.store-resultat', $patient->id) }}" method="POST">
                        @csrf
                        <ul>
                            @foreach($patient->analyses as $analyse)
                                <li>
                                    <label for="resultat_{{ $analyse->id }}">{{ $analyse->type_analyse }}</label>
                                    <input type="text" name="resultat[{{ $analyse->id }}]" class="form-control" id="resultat_{{ $analyse->id }}">
                                </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn btn-primary">Ajouter Résultat</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
