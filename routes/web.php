<?php

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

Route::view('/', 'welcome');

Route::get('/dashboard',[VacantesController::class,'index'])->name('dashboard');
Route::get('/vacantes/create',[VacantesController::class,'create'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit',[VacantesController::class,'edit'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}',[VacantesController::class,'show'])->name('vacantes.show');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
