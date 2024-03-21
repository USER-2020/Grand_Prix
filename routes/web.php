<?php

use App\Http\Controllers\Group;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreManage;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Livewire\MatchesControl;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /* Dashboasrd */
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/info-tournament/{tournament}', [HomeController::class, 'show'])->name('show.tournament');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Crear torneo */
    Route::get('/tournament-index', [TournamentController::class, 'index'])->name('index.tournament');
    Route::post('/tournament-create', [TournamentController::class, 'store'])->name('store.tournament');

    /* teams */
    Route::get('/team-index', [TeamController::class, 'index'])->name('index.teams');
    Route::post('/team-create', [TeamController::class, 'store'])->name('store.teams');
    Route::get('/team-manage/{team}', [TeamController::class, 'show'])->name('manage.teams');

    /* Administracion partidos */
    Route::get('/matches-index', [MatchesController::class, 'index'])->name('admin.matches');

    /* Administracion de grupos */
    Route::get('/manage-groups-manual/{tournament}', [MatchesController::class, 'index'])->name('admin.groups-man');
    Route::get('/manage-groups-aut/{tournament}', [Group::class, 'show'])->name('admin.groups-aut');
    // Route::get('/manage-groups-aut/{tournament}', [Group::class, 'show'])->name('admin.groups-aut');

    /* Administracion de score */
    Route::get('/manage-score-liveaction/{partido}', [ScoreManage::class, 'index'])->name('admin.score-liveaction');
});

require __DIR__.'/auth.php';
