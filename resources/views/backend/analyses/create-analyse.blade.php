<!-- create-analyse.blade.php -->

@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Créer une Analyse</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('analyses.store') }}" method="post">
                                @csrf
                              
                                <div class="form-group">
                                    <label>Type Analyse :</label>
                                    <input type="text" name="type_analyse" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Prix de l'Analyse :</label>
                                    <input type="number" name="prix_analyse" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Médecin :</label>
                                    <select name="id_medecin" class="form-control" required>
                                        <option value="">Sélectionnez un médecin</option>
                                        @foreach ($medecins as $medecin)
                                            <option value="{{ $medecin->id }}">{{ $medecin->nom_medecin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Patient :</label>
                                    <select id="patientDropdown" name="id_patient" class="form-control" required>
                                        <option value="">Sélectionnez un patient</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->nom_patient }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Affichez le numéro de téléphone au-dessus du champ nom du patient -->
                                <div id="telephoneDisplay"></div>

                                <div class="form-group">
                                    <label for="date_analyse">Date d'analyse</label>
                                    <input type="date" name="date_analyse" class="form-control" placeholder="Date d'analyse" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#patientDropdown').change(function() {
            var patientId = $(this).val();

            $.ajax({
                type: 'GET',
                url: '/get-patient-info/' + patientId,
                success: function(patient) {
                    // Afficher le numéro de téléphone au-dessus du champ nom du patient
                    $('#telephoneDisplay').text('Numéro de téléphone : ' + patient.num_patient);

                    // Mettez à jour le champ de nom du patient
                    $('#nomPatientInput').val(patient.nom_patient);
                    // Mettez à jour d'autres champs selon les besoins
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection

</body>
</html>
@endsection
