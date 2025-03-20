<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AccesoriosController;
use App\Http\Controllers\DatosTecnicosController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\FichasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarioController;

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/calendario', [CalendarioController::class,'index'])->name('calendario');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas CATEGORIAS
    Route::resource('/categorias', CategoriaController::class);
    // Ruta para actualizar la categoría
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    // Ruta para eliminar una categoría
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    //RUTAS PROVEEDOR
    Route::resource('/proveedor', ProveedorController::class);
    // Ruta para actualizar la categoría
    Route::put('/proveedor/{id}', [ProveedorController::class, 'update'])->name('proveedor.update');
    // Ruta para eliminar una categoría
    Route::delete('/proveedor/{id}', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');

    //RUTAS DE LAS AREAS
    Route::resource('/areas', AreasController::class);
    Route::put('/areas/{id}', [AreasController::class, 'update'])->name('areas.update');
    // Ruta para eliminar una categoría
    Route::delete('/areas/{id}', [AreasController::class, 'destroy'])->name('areas.destroy');


    //tabla muchos a muchos
    Route::post('/areas/asignar-categorias', [AreasController::class, 'asignarCategorias'])->name('areas.asignarCategorias');
    Route::get('/areas/{id_area}/categorias', [AreasController::class, 'mostrarAsignarCategorias']);

    // Rutas de equipos
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index'); // Nueva ruta de índice
    Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/{id_equipo}/edit', [EquipoController::class, 'show'])->name('equipos.edit');
    Route::put('/equipos/{id_equipo}',[EquipoController::class, 'update'])->name('equipos.update');
    Route::delete('/equipos/{id_equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
    
    //Rutas de equipos Tabla de accesorios
    Route::prefix('equipos/{id_equipo}/accesorios')->group(function () {
        Route::get('index', [AccesoriosController::class, 'index'])->name('equipos.accesorios.index');
        
        Route::get('create', [AccesoriosController::class, 'create'])->name('equipos.accesorios.create');

        Route::post('store', [AccesoriosController::class, 'store'])->name('equipos.accesorios.store');

        Route::put('update/{id_accesorio}', [AccesoriosController::class, 'update'])->name('equipos.accesorios.update');

        Route::get('edit/{id_accesorio}', [AccesoriosController::class, 'edit'])->name('equipos.accesorios.edit');


        
    });

    Route::delete('/equipos/{id_equipo}/accesorios/{id_accesorio}', [AccesoriosController::class, 'destroy'])->name('equipos.accesorios.destroy');
    
    Route::prefix('equipos/{id_equipo}/datos_tecnicos')->group(function () {
        Route::get('index',[DatosTecnicosController::class, 'index'])->name('equipos.datos_tecnicos.index');

        Route::get('create', [DatosTecnicosController::class, 'create'])->name('equipos.datos_tecnicos.create');

        Route::post('store', [DatosTecnicosController::class, 'store'])->name('equipos.datos_tecnicos.store');

        Route::put('update/{id_datos}',[DatosTecnicosController::class, 'update'])->name('equipos.datos_tecnicos.update');

        Route::get('edit/{id_datos}',[DatosTecnicosController::class, 'edit'])->name('equipos.datos_tecnicos.edit');

        Route::delete('{id_datos}',[DatosTecnicosController::class, 'destroy'])->name('equipos.datos_tecnicos.destroy');
    });

    Route::prefix('equipos/{id_equipo}/documentacion')->group(function () {
        Route::get('index',[DocumentacionController::class, 'index'])->name('equipos.documentacion.index');

        Route::get('create', [DocumentacionController::class, 'create'])->name('equipos.documentacion.create');

        Route::post('store',[DocumentacionController::class, 'store'])->name('equipos.documentacion.store');

        Route::put('update/{id_documentacion}', [DocumentacionController::class, 'update'])->name('equipos.documentacion.update');

        Route::get('edit/{id_documentacion}',[DocumentacionController::class, 'edit'])->name('equipos.documentacion.edit');

        Route::delete('{id_documentacion}',[DocumentacionController::class, 'destroy'])->name('equipos.documentacion.destroy');
        
    });

    //rutas par las fichas
    Route::get('/fichas_tecnicas', [FichasController::class, 'index'])->name('fichas.index');
    Route::get('/fichas_tecnicas/{id}', [FichasController::class, 'pdf'])->name('fichas.pdf');
    Route::get('/mantenimiento/{id}', [FichasController::class,'pdf_mantenimiento'])->name('fichas.pdf_mantenimiento');


});



require __DIR__.'/auth.php';
