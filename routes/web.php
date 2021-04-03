<?php

use Illuminate\Support\Facades\Route;

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
    return view('/auth/login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::resource('user','UserController');
Route::get('user/{id}/confirmar','UserController@confirmar')->name('user.confirmar');
Route::get('/cancelar1', function(){
    return redirect()->route('user.index')->with('datos','Accion Cancelada');
})->name('cancelar1');

Route::resource('empresa','EmpresaController');
Route::get('empresa/{idEmpresa}/confirmar','EmpresaController@confirmar')->name('empresa.confirmar');
Route::get('/cancelar2', function(){
    return redirect()->route('empresa.index')->with('datos','Accion Cancelada');
})->name('cancelar2');




//lees esto?