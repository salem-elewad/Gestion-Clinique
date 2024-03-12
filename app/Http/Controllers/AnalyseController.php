<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Analyse;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AnalyseController extends Controller
{
    public function index()
    {
        $analyses = Analyse::latest()->paginate(10);
        return view('backend.analyses.index-analyse', compact('analyses'));
    }

    public function create()
    {
        $medecins = Medecin::all();
        $patients = Patient::all();
        return view('backend.analyses.create-analyse', compact('medecins', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_analyse' => 'required|string|max:255',
            'prix_analyse' => 'required|numeric',
            'id_medecin' => 'required|exists:medecins,id',
            'id_patient' => 'required|exists:patients,id',
        ]);

        $analyse = new Analyse();
        $analyse->type_analyse = $request->input('type_analyse');
        $analyse->prix_analyse = $request->input('prix_analyse');
        $analyse->id_medecin = $request->input('id_medecin');
        $analyse->id_patient = $request->input('id_patient');
        $analyse->date_analyse = now();
        $analyse->id_user = Auth::user()->id;
        $analyse->save();

        return Redirect::to('analyses')->with('success', 'L\'analyse a été créée avec succès.');
    }

    public function show($id)
    {
        $analyse = Analyse::findOrFail($id);
        return view('backend.analyses.show-analyse', compact('analyse'));
    }

    public function edit($id)
    {
        $analyse = Analyse::findOrFail($id);
        $medecins = Medecin::all();
        $patients = Patient::all();
        return view('backend.analyses.edit-analyse', compact('analyse', 'medecins', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_analyse' => 'required|string|max:255',
            'prix_analyse' => 'required|numeric',
            'id_medecin' => 'required|exists:medecins,id',
            'id_patient' => 'required|exists:patients,id',
        ]);

        $analyse = Analyse::findOrFail($id);
        $analyse->type_analyse = $request->input('type_analyse');
        $analyse->prix_analyse = $request->input('prix_analyse');
        $analyse->id_medecin = $request->input('id_medecin');
        $analyse->id_patient = $request->input('id_patient');
        $analyse->date_analyse = now();
        $analyse->id_user = Auth::user()->id;
        $analyse->save();

        return redirect()->route('index-analyse')->with('success', 'L\'analyse a été modifié avec succès.');
    }

    public function destroy($id)
    {
        $analyse = Analyse::findOrFail($id);
        $analyse->delete();

        return Redirect::to('analyses')->with('success', 'L\'analyse a été supprimée avec succès.');
    }

    public function print($id)
    {
        $analyse = Analyse::findOrFail($id);

        return view('backend.analyses.print-analyse', compact('analyse'));
    }



        public function stats()
        {
            $analyseData = Analyse::selectRaw('MONTH(date_analyse) as month')
                ->selectRaw('COUNT(*) as count')
                ->selectRaw('SUM(prix_analyse) as totalPrice')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $months = $analyseData->pluck('month');
            $counts = $analyseData->pluck('count');
            $totalPrices = $analyseData->pluck('totalPrice');

            return view('backend.analyses.stats-analyse', compact('months', 'counts', 'totalPrices'));
        }

}
