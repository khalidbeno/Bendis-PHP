<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorPrincipal;
use App\Http\Controllers\OpcionController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InterfazAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\OtrosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagoController;



// Controlador principal
Route::get('/', [ControladorPrincipal::class, 'index'])->name('index');

//Controlador de opciones
Route::match(['get', 'post'], '/opcion/{opcion}', [OpcionController::class, 'elegirOpcion'])->name('opcion');

// Ruta para procesar el registro (POST)
Route::get('/registro', [RegistroController::class, 'mostrarFormulario']);
Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro');


// Ruta para procesar el login (POST)
Route::get('/login', [LoginController::class, 'mostrarFormulario'])->name('login');;
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/admin', [InterfazAdminController::class, 'index'])->name('interfaz.admin');
// ->middleware('admin');


Route::match(['get', 'post'], '/opcionAdmin/{opcionAdmin}', [AdminController::class, 'elegirGestion'])->name('opcionAdmin');





// GESTION STOCK
Route::get('/gestion', [GestionController::class, 'index'])->name('gestion.index');
Route::post('/gestion/guardar', [GestionController::class, 'guardar'])->name('gestion.guardar');
Route::post('/gestion/actualizar', [GestionController::class, 'actualizar'])->name('gestion.actualizar');
Route::post('/gestion/borrar', [GestionController::class, 'borrar'])->name('gestion.borrar');
Route::get('/gestion/mostrar', [GestionController::class, 'mostrarProductos'])->name('gestion.mostrar');



// Otros Admin
Route::get('/otros', [OtrosController::class, 'verContactos'])->name('otros.contactos');

// Carrito
Route::post('/carrito/agregar/{producto_id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'ver'])->name('carrito.ver');
Route::put('/carrito/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');


// Pedido
Route::post('/carrito/procesar', [PedidoController::class, 'procesarCarrito'])->name('carrito.procesar');

// PEste entra desde ver.php y el metodo llamama a resumen
Route::post('/pago/procesar', [PagoController::class, 'procesarPago'])->name('pago.procesar');

// Resumen es llamado en procesarPago
Route::get('/pago/resumen', function () {
    return view('carrito.resumen', [
        'pedidoId' => session('pedidoId'),
        'carrito' => session('carrito'),
        'subtotal' => session('subtotal'),
        'iva' => session('iva'),
        'total' => session('total'),
    ]);
})->name('pago.resumen');

// La llama a confirmar pago
Route::get('/pago/confirmacion', [PagoController::class, 'confirmarPago'])->name('pago.confirmacion');

Route::post('/pago/confirmar', [PagoController::class, 'confirmarPago'])->name('pago.confirmar');


// deberia de meterse aqui cunado el metodo confirmar pago le apetezca
Route::get('/gracias', function () {
    return view('carrito.gracias');
})->name('pedido.gracias');


// Contacto
Route::post('/contacto', [ContactoController::class, 'guardar'])->name('contacto.guardar');
Route::get('/mensajes', [ContactoController::class, 'ver'])->name('contacto.ver');


