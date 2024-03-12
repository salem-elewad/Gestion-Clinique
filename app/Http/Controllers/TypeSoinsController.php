<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeSoins;
use Illuminate\Support\Facades\Redirect;

class TypeSoinsController extends Controller
{
    public function index()
    {
        $typesSoins = TypeSoins::all();
        return view('backend.typesoins.index-type', compact('typesSoins'));
    }

    public function create()
    {
        return view('backend.typesoins.create-type');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_soins' => 'required|string|max:255',
        ]);

        TypeSoins::create([
            'type_soins' => $request->type_soins,
        ]);

        return Redirect::to('type_soins')->with('success', 'Le patient a été créé avec succès');

    }

    public function edit($id)
    {
        $typeSoins = TypeSoins::findOrFail($id);
        return view('backend.typesoins.edit-type', compact('typeSoins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_soins' => 'required|string|max:255',
        ]);

        $typeSoins = TypeSoins::findOrFail($id);
      /*  $typeSoins->update([
            'type_soins' => $request->type_soins,
        ]); */
        $typeSoins->type_soins = $request['type_soins'];
        $typeSoins->save();

        return Redirect::to('typesoins.update')->with('success', 'Type de soins mis à jour avec succès.');
    }
    public function show($id)
{
    $typeSoins = TypeSoins::findOrFail($id);

    // Autres opérations nécessaires pour récupérer les données liées au type de soins

    return view('backend.type_soins.show', compact('typeSoins'));
}

    public function destroy($id)
    {
        $typeSoins = TypeSoins::findOrFail($id);
        $typeSoins->delete();

        return Redirect::to('type_soins')->with('success', 'Le patient a été créé avec succès');

    }
}
