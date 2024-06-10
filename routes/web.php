<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfileController;
use App\Models\Alumno;
use App\Models\Asignatura;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('alumnos', AlumnoController::class);

Route::resource('asignaturas', AsignaturaController::class);

Route::post('notas/inserta', [NotaController::class, 'insertar'])->name('alumnos.inserta');

Route::get('notas/inserta', function() {
    $alumnos = Alumno::all();
    $asignaturas = Asignatura::all();
    return view('alumnos.inserta', compact('alumnos', 'asignaturas'));

});








require __DIR__.'/auth.php';
