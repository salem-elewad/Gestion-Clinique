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
            'unites' => 'nullable|string|max:255',
        'valeur_normale' => 'nullable|string|max:255',
          
        ]);

        $analyse = new Analyse();
        $analyse->type_analyse = $request->input('type_analyse');
        $analyse->prix_analyse = $request->input('prix_analyse');
        $analyse->unites = $request->input('unites');
        $analyse->valeur_normale = $request->input('valeur_normale');
       
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
            'unites' => 'nullable|string|max:255',
        'valeur_normale' => 'nullable|string|max:255',
        ]);

        $analyse = Analyse::findOrFail($id);
        $analyse->type_analyse = $request->input('type_analyse');
        $analyse->prix_analyse = $request->input('prix_analyse');
        $analyse->unites = $request->input('unites');
        $analyse->valeur_normale = $request->input('valeur_normale');
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
