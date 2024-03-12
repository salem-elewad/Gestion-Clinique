<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Examen;
use App\Models\Patient;
use App\Models\Analyse;
use App\Models\Medecin;
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
            'types_analyse' => 'required|array',
            'prix_analyse' => 'required|array',
        ]);

        $examen = new Examen();
        $examen->id_patient = $request->input('id_patient');
        $examen->save();

        // Récupérez les types et les prix d'analyse à partir des tableaux
        $typesAnalyse = $request->input('types_analyse');
        $prixAnalyse = $request->input('prix_analyse');

        // Associez chaque type d'analyse avec son prix et enregistrez-le dans la base de données
        for ($i = 0; $i < count($typesAnalyse); $i++) {
            $analyse = new Analyse();
            $analyse->type_analyse = $typesAnalyse[$i];
            $analyse->prix_analyse = $prixAnalyse[$i];
            $analyse->examen_id = $examen->id; // Assurez-vous de spécifier l'id de l'examen
            $analyse->save();
        }
        
        return Redirect::to('examens')->with('success', 'L\'examen a été créé avec succès.');
    }



    public function show($id)
    {
        $examen = Examen::findOrFail($id);
        return view('backend.examens.show-examen', compact('examen'));
    }

    public function edit($id)
    {
        $examen = Examen::findOrFail($id);
        $patients = Patient::all();
        $analyses = Analyse::all();

        return view('backend.examens.edit-examen', compact('examen', 'patients', 'analyses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_patient' => 'required|exists:patients,id',
            'id_analyse' => 'required|exists:analyses,id',
        ]);

        $examen = Examen::findOrFail($id);
        $examen->id_patient = $request->input('id_patient');
        $examen->id_analyse = $request->input('id_analyse');
        $examen->save();

        return redirect()->route('index-examen')->with('success', 'L\'examen a été modifié avec succès.');
    }

    public function destroy($id)
    {
        $examen = Examen::findOrFail($id);
        $examen->delete();

        return Redirect::to('examens')->with('success', 'L\'examen a été supprimé avec succès.');
    }
    public function print($id)
    {
        $examen = Examen::findOrFail($id);

        return view('backend.examens.print-examen', compact('examen'));
    }


    public function getAnalysePrice($id)
    {
        $analyse = Analyse::findOrFail($id);
        return response()->json(['prix' => $analyse->prix_analyse]);
    }

    public function getNni($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json(['nni' => $patient->nni,'cnam' => $patient->cnam, 'num_patient' => $patient->num_patient]);
    }
}


