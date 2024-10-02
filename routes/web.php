<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\ActiviteBudgetaireController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ComposantController;
use App\Http\Controllers\CoutsDepensesController;
use App\Http\Controllers\DotationController;
use App\Http\Controllers\infoAnnuleProjetController;
use App\Http\Controllers\InfoAnnuleActiviteBudController;
use App\Http\Controllers\InformationAnnuleController;
use App\Http\Controllers\MethodeCostingController;
use App\Http\Controllers\MinistereController;
use App\Http\Controllers\ModeOrganisationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SourceFinancementController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\UserController;
use App\Models\Action;
use Illuminate\Support\Facades\Route;

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

/* Just pour le development*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

/*
Route::get('/dashboard', function () {
    return view('backend.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('backend.dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

*/

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//Just pour tester 
Route::get('/ministeres/{ministere}/sections', [MinistereController::class, 'getSections']);
Route::get('/dashboard', function () {
    return view('backend.dashboard.dashboard');
})->name('dashboard');

Route::resource("/actions", ActionController::class);
Route::resource("/chapters", ChapterController::class);
Route::resource("/programmes", ProgramController::class);
Route::resource("/sections", SectionController::class);
Route::resource("/informationAnnuelles", InformationAnnuleController::class);
Route::resource('/ministeres', MinistereController::class);
Route::resource('/methodeCostings', MethodeCostingController::class);
Route::resource('/modeOrganisations', ModeOrganisationController::class);
Route::resource('/activities', ActivityController::class);
//Routes ajouter 
Route::resource('/projets', ProjectController::class);
Route::resource('/infoAnnuelArojets', InfoAnnuleProjetController::class);
Route::resource('/composants', ComposantController::class);
Route::resource('/taches', TacheController::class);
Route::resource('/activitieBudgetaires', ActiviteBudgetaireController::class);
Route::resource('/infoAnnuelleActiviteBuds', InfoAnnuleActiviteBudController::class);

Route::resource('/sourceFinancements', SourceFinancementController::class);
Route::resource('/coutDepenses', CoutsDepensesController::class);
Route::resource('/dotations', DotationController::class);





Route::group(['middleware' => ['role:Administrateur|admin']], function () {

    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('add.permissionRoles');
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('update.permissionRoles');
    //Route::resource('ministeres', MinistereController::class);
    Route::resource('users', UserController::class);
});

require __DIR__ . '/auth.php';