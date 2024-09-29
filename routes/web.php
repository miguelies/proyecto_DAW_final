<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAgenda;
use App\Http\Controllers\DownloadFileController;
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
    return redirect('inicio');
});

Route::get('/dashboard', function () {
    return redirect('inicio');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/inicio',[ControladorAgenda::class, 'getIndex'])->name('inicio');

Route::get('/perfil',[ControladorAgenda::class, 'getPerfil'])->middleware(['auth', 'verified'])->name('perfil');
Route::put('/perfil/modificar', [ControladorAgenda::class,'putPerfil'])->middleware(['auth', 'verified'])->name('perfil.modificar');

Route::get('/grupos',[ControladorAgenda::class, 'getGrupos'])->middleware(['auth', 'verified'])->name('grupos');
Route::get('/grupos/create',[ControladorAgenda::class, 'getGrupos_Create'])->middleware(['auth', 'verified'])->name('grupos_creacion_part1');
Route::post('/grupos/create', [ControladorAgenda::class,'postGrupos_Create'])->middleware(['auth', 'verified'])->name('grupos_creacion_part2');
Route::get('/grupos/{id}', [ControladorAgenda::class, 'getGrupEspe'])->middleware(['auth', 'verified']);
Route::post('/salir', [ControladorAgenda::class, 'postSalir'])->middleware(['auth', 'verified'])->name('lista.salir');
Route::post('/add', [ControladorAgenda::class, 'postAdd'])->middleware(['auth', 'verified'])->name('lista.add');
Route::post('/borrar', [ControladorAgenda::class, 'postRemove'])->middleware(['auth', 'verified'])->name('lista.remove');
Route::post('/acti_crea', [ControladorAgenda::class, 'postTareasGrupo_create'])->middleware(['auth', 'verified'])->name('lista.remove');
Route::get('/grupos/{id}/{cod}',[ControladorAgenda::class, 'getTareaGrupoEspecifica'])->middleware(['auth', 'verified'])->name('grupo.tareas.especificas');
Route::post('/grupos/entregar',[ControladorAgenda::class, 'postEntregaGrupo'])->middleware(['auth', 'verified'])->name('grupo.tareas.entrega');
Route::post('/grupos/salir',[ControladorAgenda::class, 'postBorradoTareaGrupo'])->middleware(['auth', 'verified'])->name('grupo.tareas.borrar');
Route::put('/grupos/edit', [ControladorAgenda::class,'editarTareaGrupo'])->middleware(['auth', 'verified'])->name('grupo.tareas.edit');
Route::post('/grupos/descargar',[ControladorAgenda::class, 'postDownloadGrupo'])->middleware(['auth', 'verified'])->name('grupo.tareas.descargar');


Route::get('/tareas',[ControladorAgenda::class, 'getTareas'])->middleware(['auth', 'verified'])->name('tareas');
Route::get('/tareas/{cod}',[ControladorAgenda::class, 'getTareaEspecifica'])->middleware(['auth', 'verified'])->name('tareas.especificas');
Route::post('/tareas/create',[ControladorAgenda::class, 'postTareas_create'])->middleware(['auth', 'verified'])->name('tareas.create');
Route::post('/tareas/entregar',[ControladorAgenda::class, 'postEntrega'])->middleware(['auth', 'verified'])->name('tareas.entrega');
Route::post('/tareas/salir',[ControladorAgenda::class, 'postBorradoTareaIndi'])->middleware(['auth', 'verified'])->name('tareas.borrar');
Route::put('/tareas/edit', [ControladorAgenda::class,'editarTareaIndi'])->middleware(['auth', 'verified'])->name('tareas.edit');

Route::get('/archivos',[ControladorAgenda::class, 'getArchivos'])->middleware(['auth', 'verified'])->name('archivos');
Route::post('/archivos/create',[ControladorAgenda::class, 'postArchivos_Create'])->middleware(['auth', 'verified'])->name('archivos.create');
Route::get('get/{file_name}', [ControladorAgenda::class, 'getDownload'])->middleware(['auth', 'verified'])->name('archivos.descargar');


require __DIR__.'/auth.php';
