<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Consultation;
use App\Models\Intervention;
use App\Models\Medecin;
use App\Models\Service;
use App\Models\Soins;
use App\Models\Specialiste;
use Illuminate\Http\Request;
use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function getTotalConsultationsPrice()
     {
        $currentMonth = Carbon::now()->month;
        $totalPrice = Consultation::whereMonth('created_at', $currentMonth)->sum('prix_consultation');
         return $totalPrice;
     }

     public function getTotalInterventionsPrice()
     {
        $currentMonth = Carbon::now()->month;
        $totalPrice = Intervention::whereMonth('created_at', $currentMonth)->sum('prix_intervention');
         return $totalPrice;
     }

     public function getTotalAnalysesPrice()
     {
        $currentMonth = Carbon::now()->month;
        $totalPrice = Analyse::whereMonth('created_at', $currentMonth)->sum('prix_analyse');
         return $totalPrice;
     }

     public function getTotalSoinsPrice()
     {
        $currentMonth = Carbon::now()->month;
        $totalPrice = Soins::whereMonth('created_at', $currentMonth)->sum('prix_soins');
         return $totalPrice;
     }
     public function index()
    {
        // ExampleController.php
    $count_medecins = Medecin::count();
    $count_specialistes = Specialiste::count();
    $count_services = Service::count();

    // ... le reste de votre code


        $currentMonth = Carbon::now()->month;
        $currentMonthName = Carbon::now()->monthName;
        $consultations = Consultation::whereMonth('created_at', $currentMonth)->count();
        $totalPrixConsultation = $this->getTotalConsultationsPrice();
        $interventions = Intervention::whereMonth('created_at', $currentMonth)->count();
        $totalPrixIntervention = $this->getTotalInterventionsPrice();
        $analyses = Analyse::whereMonth('created_at', $currentMonth)->count();
        $totalPrixAnalyse = $this->getTotalAnalysesPrice();

        $soins = Soins::whereMonth('created_at', $currentMonth)->count();
        $totalPrixSoin = $this->getTotalSoinsPrice();
        return view('backend.layouts.dashboard', compact('consultations', 'totalPrixConsultation','soins', 'totalPrixSoin', 'totalPrixIntervention', 'interventions','analyses', 'totalPrixAnalyse',
        'currentMonthName','count_medecins', 'count_specialistes', 'count_services'));
    }
}
