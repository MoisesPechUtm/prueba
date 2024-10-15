<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\EnemigoController;
use App\Http\Controllers\MercanciaController;
use App\Http\Controllers\PowerupController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Route;

// Rutas para UsuarioController
//Route::get('/listado', [UsuarioController::class, 'getAll']);
Route::get('/formulario_usuario', [UsuarioController::class, 'getForm']);
Route::get('/formulario_usuario/{id}', [UsuarioController::class, 'getForm']);
Route::get('/eliminar_usuario/{id}', [UsuarioController::class, 'getDelete']);
Route::post('/guardar_usuario', [UsuarioController::class, 'saveData']);

// Rutas para ComentariosController
//Route::get('/landingpage', [ComentarioController::class, 'getAll']);
Route::get('/listado_comentario', [ComentarioController::class, 'getListado']);
Route::get('/formulario_comentarios', [ComentarioController::class, 'getForm']);
Route::get('/formulario_comentarios/{id}', [ComentarioController::class, 'getForm']);
Route::get('/eliminar_comentarios/{id}', [ComentarioController::class, 'getDelete']);
Route::post('/guardar_comentario', [ComentarioController::class, 'saveData']);

// Rutas para PersonajesController
//Route::get('/landingpage', [PersonajeController::class, 'getAll']);
Route::get('/listado_personaje', [PersonajeController::class, 'getListado']);
Route::get('/formulario_personajes', [PersonajeController::class, 'getForm']);
Route::get('/formulario_personajes/{id}', [PersonajeController::class, 'getForm']);
Route::get('/eliminar_personaje/{id}', [PersonajeController::class, 'getDelete']);
Route::post('/guardar_personaje', [PersonajeController::class, 'saveData']);

// Rutas para EnemigosController
//Route::get('/landingpage', [EnemigoController::class, 'getAll']);
Route::get('/listado_enemigo', [EnemigoController::class, 'getListado']);
Route::get('/formulario_enemigos', [EnemigoController::class, 'getForm']);
Route::get('/formulario_enemigos/{id}', [EnemigoController::class, 'getForm']);
Route::get('/eliminar_enemigo/{id}', [EnemigoController::class, 'getDelete']);
Route::post('/guardar_enemigo', [EnemigoController::class, 'saveData']);

// Rutas para MercanciasController
//Route::get('/landingpage', [MercanciaController::class, 'getAll']);
Route::get('/listado_mercancia', [MercanciaController::class, 'getListado']);
Route::get('/formulario_mercancias', [MercanciaController::class, 'getForm']);
Route::get('/formulario_mercancias/{id}', [MercanciaController::class, 'getForm']);
Route::get('/eliminar_mercancia/{id}', [MercanciaController::class, 'getDelete']);
Route::post('/guardar_mercancia', [MercanciaController::class, 'saveData']);

// Rutas para PowerUpsController
//Route::get('/landingpage', [PowerupController::class, 'getAll']);
Route::get('/listado_powerup', [PowerupController::class, 'getListado']);
Route::get('/formulario_powerups', [PowerupController::class, 'getForm']);
Route::get('/formulario_powerups/{id}', [PowerupController::class, 'getForm']);
Route::get('/eliminar_powerup/{id}', [PowerupController::class, 'getDelete']);
Route::post('/guardar_powerup', [PowerupController::class, 'saveData']);

// Rutas para PlataformaController
//Route::get('/landingpage', [PlataformaController::class, 'getAll']);
Route::get('/listado_plataforma', [PlataformaController::class, 'getListado']);
Route::get('/formulario_plataformas', [PlataformaController::class, 'getForm']);
Route::get('/formulario_plataformas/{id}', [PlataformaController::class, 'getForm']);
Route::get('/eliminar_plataforma/{id}', [PlataformaController::class, 'getDelete']);
Route::post('/guardar_plataforma', [PlataformaController::class, 'saveData']);

Route::get('/', [PrincipalController::class, 'getListado']);

// Ruta adicional de prueba
Route::get('/admin', function () {
    return view('principal');
});

?>