<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\FacturaVentasController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Users
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/data', [UsersController::class, 'getData'])->name('users.data');

// Asistencias
Route::get('/asistencias', [AsistenciasController::class, 'index'])->name('asistencias.index');

// Clientes
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');

// Contratos
Route::get('/contratos', [ContratosController::class, 'index'])->name('contratos.index');

// Empleados
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');
Route::get('/empleados/data', [EmpleadosController::class, 'getData'])->name('empleados.data');
Route::get('/empleados/create', [EmpleadosController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadosController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{id}/edit', [EmpleadosController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{empleado}', [EmpleadosController::class, 'update'])->name('empleados.update');

// Facturas Ventas
Route::get('/facturaVentas', [FacturaVentasController::class, 'index'])->name('facturaVentas.index');

// Permisos
Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos.index');

// Roles
Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');

require __DIR__.'/auth.php';
