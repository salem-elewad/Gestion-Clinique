<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class ResultatController extends Controller
{
    public function index()
    {
        // Récupérer tous les patients avec leurs analyses
        $patients = Patient::with('analyses')->get();
        
        // Retourner la vue avec les données des patients
        return view('backend.patients.resultat', compact('patients'));
    }
}
