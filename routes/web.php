<?php

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
    // Agregamos un midleware para agregar la validacion de los usuarios para que
    // no se pueda ingresar sin autenticarse

})->middleware('auth');


// Ruta para ir al formulario de registro
Route::get('/register',[RegisterController::class,'create'])->middleware('guest')->name('register.index');

// Ruta para el vaciado de datos en la base, se utiliza post
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

// Ruta para ir al formulario de inicio de sesion
Route::get('/login',[SessionsController::class, 'create'])->middleware('guest')->name('login.index');

// Ruta para validar la sesion iniciada
Route::post('/login',[SessionsController::class, 'store'])->name('login.store');

//Ruta para cerrar la sesion
Route::post('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

// Ruta para redireccionar a su respectivo dashboard
Route::get('/dashboardAlumno',[RedirectController::class, 'alumno'])->middleware('auth')->name('dashboard.alumno');

// Ruta para redireccionar a su respectivo dashboard
Route::get('/dashboardMaestro',[RedirectController::class, 'maestro'])->middleware('auth')->name('dashboard.maestro');

// Ruta para hacer examenes
Route::get('/examenDocente',[RedirectController::class, 'examenDocente'])->middleware('auth')->name('examen.docente');

// Ruta para hacer examenes
Route::get('/reporteDocente',[RedirectController::class, 'reporteDocente'])->middleware('auth')->name('reporte.docente');

// Ruta para hacer examenes
Route::get('/examenAlumno',[RedirectController::class, 'examenAlumno'])->middleware('auth')->name('examen.alumno');

// Ruta para hacer examenes
Route::get('/reporteAlumno',[RedirectController::class, 'reporteAlumno'])->middleware('auth')->name('reporte.alumno');

// Ruta para hacer responder examen
Route::get('/respuestaAlumno',[RedirectController::class, 'respuestaAlumno'])->middleware('auth')->name('respuesta.alumno');

// Ruta para hacer crear examen
Route::get('/crearExamen',[RedirectController::class, 'crearExamen'])->middleware('auth')->name('crearexamen.docente');

// Ruta para guardar el examen
Route::post('/crearExamen',[RedirectController::class, 'guardarExamen'])->middleware('auth')->name('guardarExamen.docente');

// Ruta para eliminar el examen
Route::get('/eliminarExamen',[RedirectController::class, 'eliminarExamen'])->middleware('auth')->name('eliminarExamen.docente');

// Ruta para eliminar el examen
Route::post('/eliminarExamen',[RedirectController::class, 'eliminarExamenFinal'])->middleware('auth')->name('eliminarExamenFinal.docente');

// Ruta para crear preguntas del examen
Route::get('/crearPreguntas',[RedirectController::class, 'crearPreguntas'])->middleware('auth')->name('crearPreguntas.docente');

// Ruta para crear preguntas del examen
Route::post('/crearPreguntas',[RedirectController::class, 'crearPreguntasFinal'])->middleware('auth')->name('crearPreguntas.docente');

// Ruta para crear preguntas del examen
Route::post('/respuestaAlumno',[RedirectController::class, 'resultados'])->middleware('auth')->name('respuesta.alumno');

// Ruta para crear preguntas del examen
Route::get('/seleccionarEditar',[RedirectController::class, 'haciaEditar'])->middleware('auth')->name('haciaEditar.docente');

Route::post('/seleccionarEditar',[RedirectController::class, 'listarPreguntas'])->middleware('auth')->name('haciaEditarListar.docente');
//Redirigir a listar

// Enviamos al menu de editar
Route::get('/editando',[RedirectController::class,'update'])->middleware('auth')->name('editar.docente');

// Enviamos al metodo que editara la pregunta con put
Route::put('/editando',[RedirectController::class,'updatePregunta'])->middleware('auth')->name('editarPregunta.docente');

// Eliminando pregunta
Route::delete('/eliminar',[RedirectController::class,'eliminarPregunta'])->middleware('auth')->name('eliminarPregunta.docente');

// Rutas de administrador
Route::middleware(['auth','is_admin'])
    ->prefix('admin')->name('admin.')->group(function() {
        Route::get('/',          [AdminController::class,'dashboard'])->name('dashboard');
        Route::get('users',      [AdminController::class,'index'])->name('users.index');
        Route::get('users/create',[AdminController::class,'create'])->name('users.create');
        Route::post('users',     [AdminController::class,'store'])->name('users.store');
    });


