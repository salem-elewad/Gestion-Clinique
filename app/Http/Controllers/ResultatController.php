<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Resultat;
use App\Models\Analyse;

class ResultatController extends Controller
{
    public function index()
    {
        // Récupérer tous les patients avec leurs analyses
        $patients = Patient::with('analyses')->get();
        
        // Retourner la vue avec les données des patients
        return view('backend.patients.resultat', compact('patients'));
    }
    
    public function store(Request $request, $patientId)
    {
        /*
        // Valider les données du formulaire
        $request->validate([
            'resultats.*' => 'required|string', // Assurez-vous d'adapter cette règle de validation selon vos besoins
        ]);
        */

        // Récupérer le patient
        $patient = Patient::findOrFail($patientId);

        // Enregistrer les résultats pour chaque analyse
        foreach ($request->resultats as $analyseId => $resultat) {
            $analyse = Analyse::findOrFail($analyseId);
            $patient->resultats()->create([
                'resultat' => $resultat,
                'analyse_id' => $analyseId,
            ]);
        }

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'Résultats enregistrés avec succès !');
    }
}
