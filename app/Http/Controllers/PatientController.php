<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Service;
use App\Models\Analyse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $analyses = Analyse::all();
        $patients = Patient::latest()->paginate(10);

        return view('backend.patients.index-patient', compact('patients', 'services', 'analyses'));
    }

    public function create()
    {
        $services = Service::all();
        $analyses = Analyse::all();
        return view('backend.patients.create-patient', compact('services', 'analyses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_patient' => 'required|string',
            'num_patient' => 'required|string',
            'cnam' => 'required|string',
            'nni' => 'required|string',
            'id_service' => 'required|exists:services,id',
            'analyse_id' => 'required|array', // Assurez-vous que l'ID d'analyse est un tableau
            'analyse_id.*' => 'exists:analyses,id', // Assurez-vous que chaque ID d'analyse existe dans la table des analyses
        ]);
    
        // Créez une nouvelle instance de Patient et attribuez les valeurs du formulaire
        $patient = new Patient();
        $patient->nom_patient = $request->nom_patient;
        $patient->num_patient = $request->num_patient;
        $patient->cnam = $request->cnam;
        $patient->nni = $request->nni;
        $patient->id_service = $request->id_service;
        $patient->save();
    
        // Associez chaque analyse sélectionnée au patient
        foreach ($request->input('analyse_id') as $analyseId) {
            $patient->analyses()->attach($analyseId);
        }
    
        // Redirigez l'utilisateur vers la page d'index des patients avec un message de succès
        return redirect()->route('patients.index')->with('success', 'Nouveau patient et analyses ajoutées avec succès !');
    }
    

    // Autres méthodes du contrôleur
}
