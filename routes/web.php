<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CiberseguridadController;
use App\Http\Controllers\CveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VulnerabilityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;



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

Route::get('reports/index', [ReportController::class, 'index'])->name('reports.index');
Route::get('ciberseguridad/dashboard', [CiberseguridadController::class, 'index'])->name('ciberseguridad.dashboard');

//Route::post('reports/generate', [ReportController::class, 'generatePDF'])->name('reports.generate');

Route::get('reports/pdf', [ReportController::class, 'generatePDF'])->name('reports.pdf');
Route::get('reports/pdf/{idvul}', [ReportController::class, 'generatePDFIDVul'])->name('reports.pdf.idvul');



Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::resource('users', UserController::class);
Route::resource('assets', AssetController::class);
Route::resource('softwares', SoftwareController::class);

Route::prefix('assets/{asset}')->group(function() {
    Route::resource('softwares', SoftwareController::class);
});


Route::resource('cves', CveController::class);


Route::resource('vulnerabilities', VulnerabilityController::class);

Route::middleware(['auth','role:ciberseguridad'])->group(function () {
    Route::resource('assets.softwares', SoftwareController::class);
    Route::resource('vulnerabilities', VulnerabilityController::class);
});



