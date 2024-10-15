<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/listado_usuario', [UsuarioController::class, 'getApiListado']);
Route::get('/listado_personaje', [PersonajeController::class, 'getApiListado']);
Route::get('/get_personaje/{id}', [PersonajeController::class, 'getApiGetPersonajeByID']);
Route::delete('/delete_personaje/{id}', [PersonajeController::class, 'deleteApiEliminar']);
Route::post('add_personaje', [PersonajeController::class, 'postApiAddPersonaje']);
Route::put('update_personaje/{id}', [PersonajeController::class, 'putApiUpdatePersonaje']);
Route::post('search_personaje', [PersonajeController::class, 'getApiFiltro']);

//Producto
Route::get('/listado_producto', [ProductoController::class, 'getApiListado']);
Route::get('/get_producto/{id}', [ProductoController::class, 'getApiGetProductoByID']);
Route::delete('/delete_producto/{id}', [ProductoController::class, 'deleteApiEliminar']);
Route::post('add_producto', [ProductoController::class, 'postApiAddProducto']);
Route::put('update_producto/{id}', [ProductoController::class, 'putApiUpdateProducto']);
Route::post('search_producto', [ProductoController::class, 'getApiFiltro']);

//Compra
Route::get('/listado_compra', [CompraController::class, 'getApiListado']);
Route::get('/get_compra/{id}', [CompraController::class, 'getApiGetCompraByID']);
Route::post('/add_compra', [CompraController::class, 'postApiAddCompra']);
Route::post('search_compra', [CompraController::class, 'getApiFiltro']);
Route::put('update_compra/{id}', [ProductoController::class, 'putApiUpdateCompra']);

//hola
?>
