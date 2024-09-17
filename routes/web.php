<?php

use App\Livewire\CategoryMain;
use App\Livewire\Dashboard\Main;
use App\Livewire\IndexLivewire;
use App\Livewire\Product\InventarioMain;
use App\Livewire\ProductMain;
use App\Livewire\Reporte\BoletaMain;
use App\Livewire\TiendaMain;
use App\Livewire\Ventas\VentasMain;
use Illuminate\Support\Facades\Route;

//  Route::get('/', function () {
//     return view('welcome');
// });
Route::view('vermas','vermas');
Route::view('carrito','carrito');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',Main::class)->name('dashboard');
    Route::get('/productos',ProductMain::class)->name('productos');
    Route::get('/categorias',CategoryMain::class)->name('categorias');
    Route::get('/inventario',InventarioMain::class)->name('inventario');
    Route::get('/ventas',VentasMain::class)->name('ventas');
    //Route::get('/boletapdf',[VentasMain::class,'generarpdf'])->name('boletapdf');
    Route::get('/Productpdf',[InventarioMain::class,'reportePDF'])->name('Productpdf');
});

Route::get('/',[IndexLivewire::class,'render'])->name('index');
Route::get('/tienda',[TiendaMain::class,'render'])->name('tienda');
