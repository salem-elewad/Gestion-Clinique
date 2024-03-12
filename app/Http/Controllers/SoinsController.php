<?php
namespace App\Http\Controllers;

use App\Models\Soins;
use App\Models\TypeSoins;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SoinsController extends Controller
{
    public function index()
    {
        $soins = Soins::orderBy('id', 'desc')->paginate(10);

        return view('backend.soins.index-soins', compact('soins'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('backend.soins.create-soins', compact( 'patients'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'prix_soins' => 'required|numeric',
            'type_soins' => 'required|string',
            'id_patient' => 'required|exists:patients,id',
            'date_soins' => 'nullable|date',
        ]);

        Soins::create($request->all());

        return Redirect::to('soins')->with('success', 'Le soin a été créé avec succès.');
    }

    public function show($id)
    {
        $soin = Soins::findOrFail($id);
        return view('backend.soins.show-soins', compact('soin'));
    }

    public function print($id)
    {
        $soin = Soins::findOrFail($id);

        //$medecin = Medecin::all();
       // $patient = Patient::all();
        return view('backend.soins.print-soins', compact('soin'));
    }

    public function edit($id)
    {
        $soin = Soins::findOrFail($id);
        $patients = Patient::all();

        return view('backend.soins.edit-soins', compact('soin', 'patients'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prix_soins' => 'required|numeric',
            'type_soins' => 'required|string',
            'id_patient' => 'required|exists:patients,id',
            'date_soins' => 'required|date',
        ]);

        $soin = Soins::findOrFail($id);
        $soin->update($request->all());

        return redirect()->route('soins.index')->with('success', 'Le soin a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $soin = Soins::findOrFail($id);
        $soin->delete();

        return redirect()->route('soins.index')->with('success', 'Le soin a été supprimé avec succès.');
    }

    // SoinsController.php, ConsultationController.php, AnalyseController.php

            public function stats()
            {
                $months = []; // Le tableau des mois (labels)
                $counts = []; // Le tableau des nombres de prix (data)
                $totalPrices = []; // Le tableau des prix totaux (data)

                // Remplir les données des statistiques pour chaque mois
                // Vous devrez adapter le nom du modèle et les colonnes en fonction de votre base de données
                $data = Soins::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count, SUM(prix_soins) as total_price')
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();

                // Remplir les tableaux $months, $counts et $totalPrices
                foreach ($data as $item) {
                    $months[] = $item->month;
                    $counts[] = $item->count;
                    $totalPrices[] = $item->total_price;
                }

                return view('backend.soins.stats-soins', compact('months', 'counts', 'totalPrices'));
            }

}
