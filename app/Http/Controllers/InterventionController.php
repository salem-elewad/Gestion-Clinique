<?php

namespace App\Http\Controllers;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ConsoleTVs\Charts\Facades\Charts;
use App\Models\Intervention;
use App\Models\Specialiste;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Fx3costa\LaravelChartJs\Chartjs;



class InterventionController extends Controller
{
    public function index()
    {
        $interventions = Intervention::latest()->with('specialiste', 'patient', 'service', 'user')->paginate(10);
        return view('backend.interventions.index-intervention', compact('interventions'));
    }

    public function create()
    {
        $specialistes = Specialiste::all();
        $patients = Patient::all();
        $services = Service::all();
        $users = User::all();
            // Récupérer les données des interventions avec les mois correspondants
            $interventionsData = Intervention::select(DB::raw("DATE_FORMAT(date_intervention, '%Y-%m') AS month"), DB::raw("COUNT(*) AS count"), DB::raw("SUM(prix_intervention) AS total"))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        return view('backend.interventions.create-intervention', compact('specialistes', 'patients', 'services', 'interventionsData'));


    }

    public function store(Request $request)
    {
        $request->validate([
            'prix_intervention' => 'required|numeric',
            'id_specialiste' => 'required|exists:specialistes,id',
            'id_patient' => 'required|exists:patients,id',
            'id_service' => 'required|exists:services,id',
            'date_intervention' => 'nullable|date',

        ]);

        Intervention::create([
            'prix_intervention' => $request->input('prix_intervention'),
            'id_specialiste' => $request->input('id_specialiste'),
            'id_patient' => $request->input('id_patient'),
            'id_service' => $request->input('id_service'),
            'date_intervention' => now(),
        ]);

        return Redirect::to('interventions')->with('success', 'L\'intervention a été créée avec succès.');
    }


    public function show(Intervention $intervention)
    {
        return view('backend.interventions.show-intervention', compact('intervention'));
    }

    public function edit(Intervention $intervention)
    {
        $specialistes = Specialiste::all();
        $patients = Patient::all();
        $services = Service::all();
        $users = User::all();
        return view('backend.interventions.edit-intervention', compact('intervention', 'specialistes', 'patients', 'services'));
    }

    public function update(Request $request, Intervention $intervention)
    {
        $request->validate([
            'prix_intervention' => 'required|numeric',
            'id_specialiste' => 'required|exists:specialistes,id',
            'id_patient' => 'required|exists:patients,id',
            'id_service' => 'required|exists:services,id',
            'date_intervention' => 'nullable|date',

        ]);

        $intervention->update($request->all());

        return redirect()->route('index-intervention')->with('success', 'L\'intervention a été mise à jour avec succès.');
    }

    public function destroy(Intervention $intervention)
    {
        $intervention->delete();

        return Redirect::to('interventions')->with('success', 'L\'intervention a été créée avec succès.');

    }

    public function print($id)
    {
        $intervention = Intervention::findOrFail($id);

        return view('backend.interventions.print-intervention', compact('intervention'));
    }


    public function stats()
    {
        $interventionsData = Intervention::selectRaw('MONTH(date_intervention) as month, COUNT(*) as count, SUM(prix_intervention) as total_price')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = $interventionsData->pluck('month')->toArray();
        $counts = $interventionsData->pluck('count')->toArray();
        $totalPrices = $interventionsData->pluck('total_price')->toArray();

        return view('backend.interventions.stats-intervention', compact('months', 'counts', 'totalPrices'));
    }





}
