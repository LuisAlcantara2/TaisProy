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
Route::get('empresa/{idEmpresa}/procesos','EmpresaController@procesos')->name('empresa.procesos');
Route::get('empresa/{idEmpresa}/createP','EmpresaController@createP')->name('empresa.createP');
Route::get('/cancelar2', function(){
    return redirect()->route('empresa.index')->with('datos','Accion Cancelada');
})->name('cancelar2');
Route::resource('proceso','ProcesoController');
Route::get('proceso/{idProceso}/confirmar','ProcesoController@confirmar')->name('proceso.confirmar');
Route::get('proceso/{idProceso}/createI','ProcesoController@createI')->name('proceso.createI');
Route::get('proceso/{idProceso}/indicador','ProcesoController@indicador')->name('proceso.indicador');
Route::get('proceso/{idProceso}/createE','ProcesoController@createE')->name('proceso.createE');
Route::get('proceso/{idProceso}/estrategia','ProcesoController@estrategia')->name('proceso.estrategia');
Route::resource('indicador','IndicadorController');
Route::get('indicador/{idIndicador}/confirmar','IndicadorController@confirmar')->name('indicador.confirmar');
Route::get('indicador/{idIndicador}/comando','IndicadorController@comando')->name('indicador.comando');
Route::get('indicador/{idIndicador}/tablero','IndicadorController@tablero')->name('indicador.tablero');
Route::resource('estrategia','EstrategiaController');
Route::get('estrategia/{idEstrategia}/confirmar','EstrategiaController@confirmar')->name('estrategia.confirmar');
Route::resource('comando','ComandoController');
Route::resource('auditoria','AuditoriaController');

Route::get('/cancelar3', function(){
    return back()->with('datos','Accion Cancelada');
})->name('cancelar3');



//lees esto?