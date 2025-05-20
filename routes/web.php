<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\AturanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosisController;

Route::get('/', function () {
    return view('client.home');
})->name('home');
Route::get('/about', function () {
    return view('client.about');
})->name('about');

// Route::get('/diagnosis', [DiagnosisController::class, 'showForm'])->name('diagnosis.form');
// Route::post('/diagnosis/start', [DiagnosisController::class, 'startDiagnosis'])->name('diagnosis.start');
// Route::get('/diagnosis/question/{id}', [DiagnosisController::class, 'question'])->name('diagnosis.question');
// Route::post('/diagnosis/process', [DiagnosisController::class, 'processAnswer'])->name('diagnosis.process');
// Route::get('/diagnosis/result', [DiagnosisController::class, 'result'])->name('diagnosis.result');

Route::get('/diagnosis', [DiagnosisController::class, 'showForm'])->name('diagnosis.form');
Route::post('/diagnosis/start', [DiagnosisController::class, 'startDiagnosis'])->name('diagnosis.start');
Route::get('/diagnosis/question/{id}', [DiagnosisController::class, 'question'])->name('diagnosis.question');
Route::post('/diagnosis/process', [DiagnosisController::class, 'processAnswer'])->name('diagnosis.process'); // Batasi 10 request per menit
Route::get('/diagnosis/result', [DiagnosisController::class, 'result'])->name('diagnosis.result');

// Route::post('/diagnosis/save', [DiagnosisController::class, 'saveDiagnosis'])->name('diagnosis.save');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/admin/penyakit', PenyakitController::class)->middleware('auth');
Route::resource('/admin/gejala', GejalaController::class)->middleware('auth');
Route::resource('/admin/aturan', AturanController::class)->middleware('auth');
Route::get('/admin/result', [DiagnosisController::class, 'admin'])->middleware('auth')->name('admin.diagnosis.index');


