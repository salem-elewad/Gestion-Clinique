<!-- resources/views/backend/examens/create-examen.blade.php -->

@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <h2>Créer un nouvel Examen</h2>
                            <form method="post" action="{{ route('examens.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label>Patient :</label>
                                    <select id="id_patient" name="id_patient" class="form-control" required>
                                        <option value="">Sélectionnez un patient</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->nom_patient }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label id="nni_patient" style="color:rgb(40, 113, 196);">NNI :</label>
                                </div>
                                <div class="form-group">
                                    <label id="cnam" style="color:rgb(40, 113, 196);">cnam :</label>
                                </div>

                                <div class="form-group">
                                    <label id="num_patient" style="color:rgb(40, 113, 196);">Numero Tel :</label>
                                </div>

                                <div class="form-group" id="analyses-container">
                                    <label for="types_analyse">Types d'analyses :</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="types_analyse[]" class="form-control analyse-select">
                                                <option value="">Sélectionnez un Type Analyse </option>
                                                @foreach($analyses as $analyse)
                                                    <option value="{{ $analyse->id }}" data-prix="{{ $analyse->prix_analyse }}">{{ $analyse->type_analyse }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="prix_analyse[]" class="form-control prix-input" placeholder="Prix de l'analyse" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-success btn-add-analyse">+</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Créer Examen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('id_patient').addEventListener('change', function() {
        var patientId = this.value;

        $.ajax({
            url: '/patients/' + patientId + '/nni',
            type: 'GET',
            success: function(response) {
                console.log(response);  // Ajout du log pour débogage
                document.getElementById('nni_patient').innerText = 'NNI : ' + response.nni;
                document.getElementById('cnam').innerText = 'Cnam : ' + response.cnam;
                document.getElementById('num_patient').innerText = 'Numero Tel : ' + response.num_patient;
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

</script>


<script>
    $(document).ready(function() {
        // Ajoutez dynamiquement un nouveau champ d'analyse
        $('.btn-add-analyse').click(function() {
            var container = $('#analyses-container');
            var newAnalyseField = container.find('.row:first').clone();

            // Effacez la valeur du champ de sélection et du champ de prix
            newAnalyseField.find('select').val('');
            newAnalyseField.find('.prix-input').val('');

            // Ajoutez le nouveau champ au conteneur
            container.append(newAnalyseField);
        });

        // Sur le changement d'analyse, mettez à jour le prix
        $(document).on('change', '.analyse-select', function() {
            var selectedAnalyse = $(this);
            var selectedPrice = selectedAnalyse.find(':selected').data('prix');
            var priceInput = selectedAnalyse.closest('.row').find('.prix-input');

            // Mettez à jour le champ de prix
            priceInput.val(selectedPrice);
        });
    });
</script>



@endsection
