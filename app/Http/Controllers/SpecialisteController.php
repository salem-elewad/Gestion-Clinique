<?php

namespace App\Http\Controllers;

use App\Models\Specialiste;
use App\Models\Medecin;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
class SpecialisteController extends Controller
{
    public function index()
    {
        $specialistes = Specialiste::latest()->paginate(10);
        return view('backend.specialistes.index-specialiste', compact('specialistes'));
    }

    public function create()
    {
        $medecins = Medecin::all();
        $services = Service::all();
        return view('backend.specialistes.create-specialiste', compact('medecins', 'services'));
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom_specialite' => 'required',
            'id_medecin' => 'required',
            'id_service' => 'required',
        ]);

        // Création d'une nouvelle instance de Specialiste avec les données validées
        $specialiste = new Specialiste();
        $specialiste->nom_specialite = $validatedData['nom_specialite'];
        $specialiste->id_medecin = $validatedData['id_medecin'];
        $specialiste->id_service = $validatedData['id_service'];
        $specialiste->save();
        toast('Le spécialiste a été créé avec succès','success','top-right')->showCloseButton();

        return redirect()->route('specialistes.index')->with('status', 'Le spécialiste a été créé avec succès');
    }

    public function show($id)
    {
        $specialiste = Specialiste::findOrFail($id);
        return view('backend.specialistes.show-specialiste', compact('specialiste'));
    }

    public function edit($id)
    {
        $specialiste = Specialiste::findOrFail($id);
        $medecins = Medecin::all();
        $services = Service::all();
        return view('backend.specialistes.edit-specialiste', compact('specialiste', 'medecins', 'services'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom_specialite' => 'required',
            'id_medecin' => 'required',
            'id_service' => 'required',
        ]);

        $specialiste = Specialiste::findOrFail($id);
        $specialiste->nom_specialite = $validatedData['nom_specialite'];
        $specialiste->id_medecin = $validatedData['id_medecin'];
        $specialiste->id_service = $validatedData['id_service'];
        $specialiste->save();

        return redirect()->route('specialistes.index')->with('status', 'Le spécialiste a été mis à jour avec succès');
    }

    public function destroy(Specialiste $specialiste)
    {
        $specialiste->delete();

        return redirect()->route('specialistes.index')->with('status', 'Le spécialiste a été supprimé avec succès');
    }
}
