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
    return view('welcome');
});

///Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('ingresar');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('tramite/inicio', 'InicioController@index')->name('inicio');

Route::resource('tramite/usuarios', 'UsuarioController');

Route::resource('tramite/documentos', 'TramiteController');

Route::resource('tramite/area', 'AreaController');
Route::resource('tramite/remitente', 'RemitenteController');
Route::resource('tramite/tipo-usuario', 'UsuarioController');
Route::resource('tramite/tipo-documentos', 'TipodocumentoController');
Route::resource('tramite/empresa', 'EmpresaController');
Route::resource('tramite/emitidos', 'EmitidosController');
Route::resource('tramite/control-documentos', 'ControldocumentosController');

Route::get('tramite/documentos-tipo-documentos', 'ReporteTipoDocumentoController@index');

Route::post('filter', 'FilterUsuarioController@index');

Route::post('filterTipoTramite', 'TipoTramiteController@index');

Route::get('solicitante', 'ObtenerRemitenteController@index');

