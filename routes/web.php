<?php

use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacantesController;
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

Route::view('/', 'welcome')->name('home');

Route::get('/dashboard',[VacantesController::class,'index'])->middleware(['auth','rol.reclutador','verified'])->name('dashboard');
Route::get('/vacantes/create',[VacantesController::class,'create'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit',[VacantesController::class,'edit'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}',[VacantesController::class,'show'])->name('vacantes.show');

Route::get('/notificaciones',NotificacionController::class)->middleware(['auth','verified','rol.reclutador'])->name('notificaciones');
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
