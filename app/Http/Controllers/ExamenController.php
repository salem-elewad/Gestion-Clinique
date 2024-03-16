<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Examen;
use App\Models\Patient;
use App\Models\Analyse;
use Illuminate\Support\Facades\Redirect;

class ExamenController extends Controller
{
    public function index()
    {
        $examens = Examen::latest()->paginate(10);
        return view('backend.examens.index-examen', compact('examens'));
    }

    public function create()
    {
        $patients = Patient::all();
        $analyses = Analyse::all();

        return view('backend.examens.create-examen', compact('patients', 'analyses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_patient' => 'required|exists:patients,id',
            'id_analyse' => 'required|array',
            'id_analyse.*' => 'exists:analyses,id', // Assurez-vous que chaque ID d'analyse existe dans la table des analyses
        ]);
    
        $examen = new Examen();
        $examen->id_patient = $request->input('id_patient');
        $examen->save();
    
        // Associez chaque analyse sélectionnée à l'examen
        foreach ($request->input('id_analyse') as $analyseId) {
            $examen->analyses()->attach($analyseId);
        }
    
        return Redirect::to('examens')->with('success', 'L\'examen a été créé avec succès.');
    }
    

      // Les autres méthodes du contrôleur restent inchangées
}
