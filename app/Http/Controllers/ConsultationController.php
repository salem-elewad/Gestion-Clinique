<?php
namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::latest()->paginate(10);
        //$users = DB::table('consultations')->simplePaginate(15);
        $medecins = Medecin::all();
        $patients = Patient::all();
        return view('backend.consultations.index-consultation', compact('consultations','medecins','patients'));
    }

    public function create()
    {


        $medecins = Medecin::all();
        $patients = Patient::all();
        return view('backend.consultations.create-consultation', compact('medecins','patients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prix_consultation' => 'required',
            'id_medecin' => 'required|exists:medecins,id',
            'id_patient' => 'required|exists:patients,id',
        ]);

    // Créez une instance de la consultation avec les données validées
    $consultation = new Consultation($validatedData);

    // Enregistrez la consultation dans la base de données
   // $consultation->save();

    // Redirigez l'utilisateur vers la page de confirmation avec les données de la consultation
      $consultation = new Consultation();
        $consultation->prix_consultation = $validatedData['prix_consultation'];
        $consultation->id_medecin = $validatedData['id_medecin'];
        $consultation->id_patient = $validatedData['id_patient'];
        $consultation->date_consultation = now();
        $consultation->save();
        toast('Medecin a ete bien cree ','success','top-right')->showCloseButton();

        return Redirect::to('consultations')->with('success', 'La consultation a été ajouté avec succès');

    }
            public function print($id)
        {
            $consultation = Consultation::findOrFail($id);

            //$medecin = Medecin::all();
           // $patient = Patient::all();
            return view('backend.consultations.print-consultation', compact('consultation'));
        }


    public function confirm(Request $request)
    {
     //   $medecin = Medecin::all();
       // $patient = Patient::all();
        return view('backend.consultations.confirm-consultation', compact('consultation'));
    }

    public function validateConsultation(Consultation $consultation)
    {
        $consultation->timestamps = false;
        $consultation->save();

        // Code pour l'impression de la consultation

        return redirect()->route('index-consultation', $consultation->id);
    }

    public function show(Consultation $consultation)
    {
        return view('backend.consultations.show-consultation', compact('consultation'));
    }

    public function edit(Consultation $consultation)
    {

        $medecins = Medecin::all();
        $patients = Patient::all();
        return view('backend.consultations.edit-consultation', compact('consultation', 'medecins', 'patients'));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $validatedData = $request->validate([

            'prix_consultation' => 'required',
            'id_medecin' => 'required|exists:medecins,id',
            'id_patient' => 'required|exists:patients,id',
        ]);
        $consultation->prix_consultation = $validatedData['prix_consultation'];
        $consultation->id_medecin = $validatedData['id_medecin'];
        $consultation->id_patient = $validatedData['id_patient'];
        $consultation->save();

        return redirect()->route('index-consultation', $consultation->id);
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return Redirect::to('consultations')->with('success', 'Le patient a été créé avec succès');

    }

    // ...

    public function stats()
    {
        $consultationData = Consultation::selectRaw('MONTH(date_consultation) as month')
            ->selectRaw('COUNT(*) as count')
            ->selectRaw('SUM(prix_consultation) as totalPrice')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = $consultationData->pluck('month');
        $counts = $consultationData->pluck('count');
        $totalPrices = $consultationData->pluck('totalPrice');

        return view('backend.consultations.stats-consultation', compact('months', 'counts', 'totalPrices'));
    }


}
