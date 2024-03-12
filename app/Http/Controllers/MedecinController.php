<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins = Medecin::latest()->paginate(10);

        return view('backend.medecins.index-medecin', compact('medecins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.medecins.create-Medecin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_medecin' => 'required',
            'phone' => 'required',

        ]);

        $Medecin = Medecin::create($data);

       // alert()->Html('Effectue', 'Medecin a ete bien creer !');
        // example:
        toast('Medecin a ete bien cree ','success','top-right')->showCloseButton();
//        Alert::success('Effectue', 'Medecin a ete bien creer !');
        return redirect()->route('medecins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medecin $Medecin)
    {
        return view('backend.medecins.show-Medecin', compact('Medecin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medecin $Medecin)
    {
        $edit = $Medecin;
        return view('backend.medecins.edit-Medecin', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medecin $Medecin)
    {
        $data = $request->validate([
            'nom_medecin' => 'required',
            'phone' => 'required',
        ]);

        $Medecin->update($data);

        if ($Medecin) {
            $notification = array(
                'message' => 'Medecin a été mis à jour',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Une erreur est survenue',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('medecins.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medecin $Medecin)
    {
        $Medecin->delete();

        $notification = [
            'message' => 'Le médecin a été supprimé avec succès',
            'alert-type' => 'success',
        ];

        return redirect()->route('medecins.index')->with($notification);
    }
}
