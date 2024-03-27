<?php
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialisteController;
use App\Http\Controllers\TypeSoinsController;
use App\Http\Controllers\SoinsController;
use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\ResultatController;
use App\Models\Examen;
use App\Models\Analyse;
use App\Models\Intervention;
use App\Models\Service;
use App\Models\Specialiste;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
// Gestion des utilisateurs
Route::get('/all-user', [App\Http\Controllers\backend\UserController::class, 'AllUser'])->name('alluser');
Route::get('/add-user-index', [App\Http\Controllers\backend\UserController::class, 'AddUserIndex'])->name('AddUserIndex');
Route::post('insert-user', [App\Http\Controllers\backend\UserController::class, 'InsertUser'])->name('InsertUser');
Route::get('/edit-user/{id}', [App\Http\Controllers\backend\UserController::class, 'EditUser'])->name('EdittUser');
Route::post('/update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUser'])->name('UpdateUser');
Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'DeleteUser'])->name('DeleteUser');
*/
Route::get('/index-intervention', [App\Http\Controllers\InterventionController::class, 'index'])->name('index-intervention');
Route::get('/print-intervention/{id}', [App\Http\Controllers\InterventionController::class, 'print'])->name('intervention.print');
Route::get('/create-intervention', [App\Http\Controllers\InterventionController::class, 'create'])->name('intervention.create');
Route::post('/update-intervention/{id}', [App\Http\Controllers\InterventionController::class, 'update'])->name('intervention.update');
Route::get('/show-intervention/{id}', [App\Http\Controllers\InterventionController::class, 'show'])->name('intervention.show');
Route::get('/delete-/{id}', [App\Http\Controllers\InterventionController::class, 'destroy'])->name('intervention.destroy');
Route::resource('interventions', InterventionController::class);



Route::get('/stats-analyse', [App\Http\Controllers\AnalyseController::class, 'stats'])->name('analyse.stats');
Route::get('/index-analyse', [App\Http\Controllers\AnalyseController::class, 'index'])->name('index-analyse');
Route::get('/print-analyse/{id}', [App\Http\Controllers\AnalyseController::class, 'print'])->name('analyse.print');
Route::get('/create-analyse', [App\Http\Controllers\AnalyseController::class, 'create'])->name('analyse.create');
Route::post('/update-analyse/{id}', [App\Http\Controllers\AnalyseController::class, 'update'])->name('analyse.update');
Route::get('/show-analyse/{id}', [App\Http\Controllers\AnalyseController::class, 'show'])->name('analyse.show');
Route::get('/delete-analyse/{id}', [App\Http\Controllers\AnalyseController::class, 'destroy'])->name('analyse.destroy');
Route::resource('analyses', AnalyseController::class);

Route::get('/stats-soins', [App\Http\Controllers\SoinsController::class, 'stats'])->name('soins.stats');
Route::get('/index-soins', [App\Http\Controllers\SoinsController::class, 'index'])->name('soins.index');
Route::get('/print-soins/{id}', [App\Http\Controllers\SoinsController::class, 'print'])->name('soins.print');
Route::get('/create-soins', [App\Http\Controllers\SoinsController::class, 'create'])->name('soins.create');
Route::post('/update-soins/{id}', [App\Http\Controllers\SoinsController::class, 'update'])->name('soins.update');
Route::get('/show-soins/{id}', [App\Http\Controllers\SoinsController::class, 'show'])->name('soins.show');
Route::get('/delete-soins/{id}', [App\Http\Controllers\SoinsController::class, 'destroy'])->name('soins.destroy');
Route::resource('soins', SoinsController::class);




Route::get('/index-type', [App\Http\Controllers\TypeSoinsController::class, 'index'])->name('typesoins.index');
Route::get('/create-type', [App\Http\Controllers\TypeSoinsController::class, 'create'])->name('typesoins.create');
Route::post('/update-type/{id}', [App\Http\Controllers\TypeSoinsController::class, 'update'])->name('typesoins.update');
Route::get('/show-type/{id}', [App\Http\Controllers\TypeSoinsController::class, 'show'])->name('typesoins.show');
Route::get('/delete-typesoins/{id}', [App\Http\Controllers\TypeSoinsController::class, 'destroy'])->name('typesoins.destroy');
Route::resource('type_soins', TypeSoinsController::class);


Route::get('/stats-consultation', [App\Http\Controllers\ConsultationController::class, 'stats'])->name('consultations.stats');
Route::get('/print-consultation/{id}', [App\Http\Controllers\ConsultationController::class, 'print'])->name('consultations.print');
Route::get('/index-consultation', [App\Http\Controllers\ConsultationController::class, 'index'])->name('index-consultation');
Route::get('/create-consultation', [App\Http\Controllers\ConsultationController::class, 'create'])->name('consultation.create');
Route::post('/update-consultation/{id}', [App\Http\Controllers\ConsultationController::class, 'update'])->name('consultation.update');
Route::get('/delete-consultation/{id}', [App\Http\Controllers\ConsultationController::class, 'destroy'])->name('consultation.destroy');
Route::resource('consultations', ConsultationController::class);


Route::get('/index-specialiste', [App\Http\Controllers\SpecialisteController::class, 'index'])->name('specialiste.index');
Route::get('/create-specialiste', [App\Http\Controllers\SpecialisteController::class, 'create'])->name('specialiste.create');
Route::post('/update-specialiste/{id}', [App\Http\Controllers\SpecialisteController::class, 'update'])->name('specialiste.update');
Route::get('/delete-specialiste/{id}', [App\Http\Controllers\SpecialisteController::class, 'destroy'])->name('specialiste.destroy');
Route::resource('specialistes', SpecialisteController::class);


Route::get('/index-service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');
Route::get('/create-service', [App\Http\Controllers\ServiceController::class, 'create'])->name('service.create');
Route::post('/update-service/{id}', [App\Http\Controllers\ServiceController::class, 'update'])->name('service.update');
Route::get('/delete-service/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy');
Route::resource('services', ServiceController::class);


Route::get('/index-medecin', [App\Http\Controllers\MedecinController::class, 'index'])->name('medecin.index');
Route::get('/create-medecin', [App\Http\Controllers\MedecinController::class, 'create'])->name('medecin.create');
Route::post('/update-medecin/{id}', [App\Http\Controllers\MedecinController::class, 'update'])->name('medecin.update');
Route::get('/delete-medecin/{id}', [App\Http\Controllers\MedecinController::class, 'destroy'])->name('medecin.destroy');
Route::resource('medecins', MedecinController::class);


Route::get('/index-patient', [App\Http\Controllers\PatientController::class, 'index'])->name('index');
Route::get('/create-patient', [App\Http\Controllers\PatientController::class, 'create'])->name('create');
Route::post('/update-patient/{id}', [App\Http\Controllers\PatientController::class, 'update'])->name('update');
Route::get('/show-patient/{id}', [App\Http\Controllers\PatientController::class, 'show'])->name('show');
Route::get('/delete-patient/{id}', [App\Http\Controllers\PatientController::class, 'destroy'])->name('destroy');

Route::resource('patients', PatientController::class);

Route::get('/index-examen', [App\Http\Controllers\ExamenController::class, 'index'])->name('index');
Route::get('/create-examen', [App\Http\Controllers\ExamenController::class, 'create'])->name('create');
Route::get('/print-examen/{id}', [App\Http\Controllers\ExamenController::class, 'print'])->name('examen.print');
//Route::get('/patients/{id}/info', [PatientController::class, 'getPatientInfo']);
Route::get('/patients/{id}/nni', [App\Http\Controllers\PatientController::class, 'getNni'])->name('patients.nni');
//Route::get('/patients/{id}/nni', [App\Http\Controllers\PatientController::class, 'getPinfo'])->name('patients.nni');
//Route::get('/patients/{id}/num_patient', [App\Http\Controllers\PatientController::class, 'getPinfo'])->name('patients.num_patient');
//Route::get('/patients/{id}/cnam', [App\Http\Controllers\PatientController::class, 'getPinfo'])->name('patients.cnam');

Route::get('/examens/create', [ExamenController::class, 'create'])->name('examens.create');
Route::post('/examens', [ExamenController::class, 'store'])->name('examens.store');
Route::resource('examens', ExamenController::class);
// resultats
Route::get('/resultat', [App\Http\Controllers\ResultatController::class, 'index'])->name('resultat.index');
Route::post('/resultat/store', [App\Http\Controllers\ResultatController::class, 'store'])->name('resultat.store');
//Route::get('/patients/{id}/printResults', [PatientController::class, 'printResults'])->name('patients.printResults');
//Route::post('/patients/{id}/store-resultat', [PatientController::class, 'storeResultat'])->name('patients.store-resultat');
Route::get('/patients/{id}/print-results', [PatientController::class, 'printResults'])->name('patients.print-results');


// Route pour afficher la vue des résultats et gérer la soumission des nouveaux résultats
//Route::get('/patients/{id}/view-results', [PatientController::class, 'viewResults'])->name('patients.view-results');
Route::post('/patients/{id}/store-resultat', [PatientController::class, 'storeResultat'])->name('patients.store-resultat');

//Route::get('/patients/{id}/view-results', [PatientController::class, 'viewResults'])->name('patients.view-results');
Route::get('/patients/{id}/view-results', [PatientController::class, 'viewResults'])->name('patients.view-results');

Route::get('/patients/{id}/print-results', [PatientController::class, 'printResults'])->name('patients.print-results');



Route::group(['middleware' => ['auth']], function(){
    Route::get('/stats-intervention', [App\Http\Controllers\InterventionController::class, 'stats'])->name('intervention.stats');

Route::resource('roles', RoleController::class);
Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
Route::resource('users', UserController::class);

});

//Route::get('/index-user', [App\Http\Controllers\UserController::class, 'indexUser'])->name('indexUser');
