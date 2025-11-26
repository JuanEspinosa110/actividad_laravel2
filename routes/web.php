<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadoController as ControllersEmpleadoController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('welcome');
}); 

route::get('/', function(){
    return view('auth.login');
});

//Route::get('Empleados/create', [EmpleadoController::class, 'create']);
route::resource('Empleados', EmpleadoController::class)->middleware('auth');


Route::resource('Empleados', EmpleadoController::class);
Auth::routes();

Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::group(['middleware' => 'auth'], function(){
    route::get('/', [EmpleadoController::class, 'index'])->name('home');
});