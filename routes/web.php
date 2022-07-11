<?php

use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauController;
// use App\Http\Controllers\PersonneController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/home', function () {
    return view('index');
})->name('home');


Route::middleware(['auth','admin'])->group(function(){

// Route::get('/home', [DashboardController::class, 'diagram'])->name("home");
 Route::get('/statistiques', [DashboardController::class, 'diagram'])->name("stat");

//Filières
Route::get('/filieresIndex', [FiliereController::class, 'index'])->name("filieres.index");
Route::get('/filieresCreate', [FiliereController::class, 'create'])->middleware(['auth'])->name("filieres.create");
Route::post('/filieresStore', [FiliereController::class, 'store'])->name("filieres.store");
Route::get('/filiereDelete/{filiere}',[FiliereController::class, 'delete'])->name('filieres.delete');
Route::put('/filiereUpdate/{filiere}',[FiliereController::class, 'update'])->name('filieres.update');
Route::get('/filiereEdit/{filiere}',[FiliereController::class, 'edit'])->name('filieres.edit');

// Modules
Route::get('/modulesCreate', [ModuleController::class, 'create'])->name("modules.create");
Route::get('/modulesIndex', [ModuleController::class, 'index'])->name("modules.index");
Route::get('/modulesEdit/{module}', [ModuleController::class, 'edit'])->name("modules.edit");
Route::post('/modulesStore', [ModuleController::class, 'store'])->name("modules.store");
Route::get('/modulesDelete/{module}', [ModuleController::class, 'delete'])->name("modules.delete");
Route::put('/modulesUpdate/{module}', [ModuleController::class, 'update'])->name("modules.update");

//Matières
Route::get('matieresIndex',[MatiereController::class,'index'])->name("matieres.index");
Route::get('matieresCreate',[MatiereController::class,'create'])->name("matieres.create");
Route::post('matieresStore',[MatiereController::class,'store'])->name("matieres.store");
Route::get('matieresEdit/{matiere}',[MatiereController::class,'edit'])->name("matieres.edit");
Route::get('matieresDelete/{matiere}',[MatiereController::class,'delete'])->name("matieres.delete");
Route::put('matieresUpdate/{matiere}',[MatiereController::class,'update'])->name("matieres.update");


//Niveaux
Route::get('niveauxIndex',[NiveauController::class,'index'])->name("niveaux.index");
Route::get('niveauxCreate',[NiveauController::class,'create'])->name("niveaux.create");
Route::post('niveauxStore',[NiveauController::class,'store'])->name("niveaux.store");
Route::get('niveauxEdit/{niveau}',[NiveauController::class,'edit'])->name("niveaux.edit");
Route::put('niveauxUpdate/{niveau}',[NiveauController::class,'update'])->name("niveaux.update");
Route::get('niveauxDelete/{niveau}',[NiveauController::class,'delete'])->name("niveaux.delete");


// Route::resource('personnes', PersonneController::class);

Route::resource('etudiants', EtudiantController::class);
Route::post('/importStudent',[EtudiantController::class, 'import'])->name('etudiant.import');



Route::resource('professeurs', ProfesseurController::class);

});


Route::middleware(['auth','etudiant'])->group(function(){
    Route::get('etudiant/mesAbsences',[EtudiantController::class,'mesAbsences'])->name("etudiants.mesabsences");
    Route::get('/etudiant', function () {
        return "Bonjour cher etudiant";
    });


});


    Route::middleware(['auth','enseignant'])->group(function(){
        Route::get('/enseignant', function () {
            return "Bonjour cher professeur";});

           Route::get('/statistiquess', [DashboardController::class, 'diagram'])->name("statt");
            Route::resource('absences', AbsenceController::class);
            Route::get('matieres/{id}',[AbsenceController::class,'getMatByFilProf']);
            Route::get('etudiant/{id}',[AbsenceController::class,'getEtudByNiv']);
            Route::get('creneaux/{id}',[AbsenceController::class,'getCrenByProfMat']);
           Route::get('/absenceStore',[AbsenceController::class,'store']);

            Route::post('/export-excel',[AbsenceController::class, 'exportIntoExcel']);

Route::get('/export-csv',[AbsenceController::class, 'exportIntoCSV']);

Route::get('/exportView',[AbsenceController::class, 'afficher']);

            Route::get('absencesModifier',[AbsenceController::class,'modifier'])->name("absences.modifier");
        });



require __DIR__.'/auth.php';
