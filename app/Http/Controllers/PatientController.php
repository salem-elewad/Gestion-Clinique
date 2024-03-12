<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Session;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $patients = Patient::latest()->paginate(10);

        return view('backend.patients.index-patient', compact('patients','services'));
    }

    public function create()
    {   $services = Service::all();
        return view('backend.patients.create-patient', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_patient' => 'string',
            'num_patient' => 'string',
            'cnam' => 'string',
            'nni' => 'string',
            'id_service' => 'exists:services,id',
        ]);

        $patient = new Patient();
        $patient->nom_patient = $request->nom_patient;
        $patient->num_patient = $request->num_patient;
        $patient->cnam = $request->cnam;
        $patient->nni = $request->nni;
        $patient->id_service = $request->id_service;

        $patient->save();
        Alert::success('Success', 'Nouvau patient a ete creer ! ');
           return Redirect::to('patients');

    }

    public function show(Patient $patient)
    {
        return view('backend.patients.show-patient', compact('patient'));
    }

    public function edit($id)
    {
        $services = Service::all();
        $patient = Patient::findOrFail($id);
        Alert::warning('Warning', 'Voulez vous modifier ce patient');
        return view('backend.patients.edit-patient', compact('patient', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_patient' => 'string',
            'num_patient' => 'string',
            'cnam' => 'string',
            'nni' => 'string',
            'id_service' => 'exists:services,id',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->nom_patient = $request->nom_patient;
        $patient->num_patient = $request->num_patient;
        $patient->cnam = $request->cnam;
        $patient->nni = $request->nni;
        $patient->id_service = $request->id_service;

        $patient->save();
        Alert::info('Modifier', 'Patient a ete modifier');
        return Redirect::to('patients');

    }

    public function destroy(Patient $patient)
    {

        $patient->delete();

        return Redirect::to('patients');


    }
    public function getNni($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json(['nni' => $patient->nni,'cnam' => $patient->cnam, 'num_patient' => $patient->num_patient]);
    }
}
