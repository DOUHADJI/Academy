<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\SchedulesController;
use App\Http\Controllers\Admin\SchoolsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\SchoolYearController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\StudentInformationsController;
use App\Http\Controllers\StudentScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureStudentInfosComplete;
use Illuminate\Support\Facades\Route;

/*
--------------------------------------------------------------
| Web Routes
--------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect() -> route('showLogin');
});

/**
 * The guest middleware routes
 */

 Route::middleware('guest') -> group(function()
 {
    Route::controller(RegisterController::class) -> group( function()
    {
        Route::get('/register', 'index') ->name('showRegister');
        Route::post('/register', 'store') ->name('handleRegister');
    });

    Route::controller(LoginController::class) -> group( function()
    {
        Route::get('/login', 'index') -> name('showLogin');
        Route::post('/login', 'show') ->name('handleLogin');
    });
    
 });

    Route::get('/logout',[LoginController::class,"logout"]) -> middleware("auth") -> name("handleLogout");

 /**
 * Authenticated   Student routes 
 */

 Route::middleware(['auth', "student"]) -> group( function()
 {
    /**
    * Student profil is uncomplete
    */
    Route::controller(StudentInformationsController::class) -> group( function()
    {
        Route::get('/enregistrer-informations-identite-adresse-scolarite-etudiant', 'show') ->name('updateStudent');
        Route::post('/enregistrer-informations-identite-adresse-scolarite-etudiant', 'store') ->name('storeStudent');

    });

    /**
    *  student profil complete 
    */

    Route::middleware('studentProfilComplete') -> group( function()
    {
        Route::controller(StudentInformationsController::class) -> group( function()
        {    
            Route::get('/informations-identite-adresse-scolarite-etudiant', 'index') ->name('showStudent');
        });
    
        Route::controller(AdmissionController::class)->group(function ()
        {
           Route::get("/choix-de-parcours","index" ) ->name("showAdmission"); 
           Route::get("/choix-de-parcours/resume", "seeAdmission") -> name("seeAdmission");
           Route::post("/choix-de-parcours", "storeAdmission") -> name("storeAdmission");
           Route::get("/cv","cv")->name("seeCV"); 
        });

        Route::controller(StudentScheduleController::class)->group(function()
        {
            Route::get('/inscription', 'index') ->name('showInscription');
            Route::post('/inscription', 'inscription') ->name('chooseSchedule');
            Route::get('/fiche-ues', 'ues') ->name('seeUes');
            
        });
        
    });
    
   
 });







Route::get('/tableau-de-bord', [UserController::class, 'index']) -> middleware('auth') ->name('showDashboard');



/**
 * Admin panel routes
 */
Route::middleware(["auth", "admin"]) -> prefix('backoffice') -> group( function()
{
   Route::controller(PanelController::class) -> group(function()
   {
        Route::get('/', 'index') ->name('get-admin-panel-index');
   }); 

 
   Route::controller(SchoolsController::class) -> group(function()
   {
        Route::get('/facultes-et-ecoles', 'index') -> name('showSchools');
        Route::post('/facultes-et-ecoles', 'create') -> name('createSchool');
        Route::get('/facultes-et-ecoles/{school}','show') -> name('showSchool');
   
    }); 

    Route::controller(SchedulesController::class) -> group( function()
    {
        Route::post('/facultes-et-ecoles/{school}', 'create' ) ->name("createSchedule");
    });

    Route::controller(OffersController::class)-> group( function()
    {
        Route::post('/facultes-et-ecoles/creer-nouveau-cours/{school}', 'create') -> name('createOffer');
        
        Route::get('/facultes-et-ecoles/creer-nouveau-cours/{school}', function ($school)
        {
            return redirect() -> route('showSchool', $school);
        });

        Route::get('/facultes-et-ecoles/mettre-cours-a-jour/{school}', 'show') -> name('showOffer');
        
        Route::post('/facultes-et-ecoles/mettre-cours-a-jour/{school}', 'update') -> name('updateOffer');
        
        Route::post('/facultes-et-ecoles/supprimer-cours/{school}', 'delete') -> name('deleteOffer');
    });

    Route::controller(SchoolYearController::class) -> group( function()
    {
        Route::get('/annee-scolaire-en-cours', "index") -> name('showYear');
        Route::get('/definir-une-nouvelle-annee-scolaire', 'show') -> name('defineYear');
        Route::post('/definir-une-nouvelle-annee-scolaire', 'store') -> name('StoreYear');
        Route::get('/modifier-annee-scolaire-en-cours', 'showYear') -> name('showYearForUpdate');
        Route::post('/modifier-annee-scolaire-en-cours', 'update') -> name('updateYear');
    });

    Route::controller(AdmissionController::class) -> group( function()
    {
        Route::get('/admissions/en-attente', "show") -> name("showAdmissions");
        Route::get('/admissions', "all") -> name("allAdmissions");
        Route::post('/admissions', "treatAdmission") -> name("treatAdmission");
    });

  
   
}); 


/**
 * 
 * utiliser laravel echo et pusher
 * Firebase cloud messages 
 * Pour le CI github actions
 */