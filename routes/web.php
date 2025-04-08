<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AseguradoraController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TipoCitaController;
use App\Http\Controllers\CitasController;


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


Route::get('/index', function () {
    return view('index');
});

Route::get('/sign-up', function () {
    return view('auth.sign-up');
});

Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/sign-in', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return view('index');
})->middleware('auth');

Route::get('/sign-up', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/sign-up', [AuthController::class, 'register']);

Route::get('/registrar-pacientes', function () {
    $aseguradoras = \App\Models\Aseguradora::all(); // Fetch aseguradoras
    return view('register-paciente', compact('aseguradoras'));
})->middleware('auth');

Route::middleware('auth')->post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');

Route::resource('pacientes', PacienteController::class);

Route::get('pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::post('pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');

Route::get('citas/create', [CitaController::class, 'create'])->name('citas.create');
//Route::post('citas/{id}', [CitaController::class, 'update'])->name('citas.update'); // Ensure this route is defined as POST
Route::post('citas', [CitaController::class, 'store'])->name('citas.store');

//Route::resource('citas', CitaController::class);

Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');


Route::post('/citas/{id}/marcar-entrada', [CitaController::class, 'marcarEntrada'])->name('citas.marcarEntrada');
Route::post('/citas/{id}/marcar-salida', [CitaController::class, 'marcarSalida'])->name('citas.marcarSalida');
Route::post('/citas/{id}/cancelar', [CitaController::class, 'cancelarCita'])->name('citas.cancelar');

Route::resource('aseguradoras', AseguradoraController::class);
Route::resource('doctores', DoctorController::class);
Route::resource('tipos-citas', TipoCitaController::class);



