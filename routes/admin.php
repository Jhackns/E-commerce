<?php

use App\Http\Livewire\Admin\CategoryCrud;
use App\Http\Livewire\Admin\ProductManagement;
use App\Http\Livewire\Admin\RoleManagement;
use App\Http\Livewire\Admin\UserManagement;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:Administrador|Vendedor']], function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/roles',RoleManagement::class)->name('roles');
    //Route::get('/roles',RoleManagement::class)->middleware('permission:Listar clientes')->name('roles');
    Route::get('/users',UserManagement::class)->name('users');
    Route::get('/categorias',CategoryCrud::class)->name('categories');
    Route::get('/productos',ProductManagement::class)->name('products');
});

