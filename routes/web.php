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

//modal-remitente inicio//
Route::get('tramite/solicitantes-create', 'TramiteController@CrearSolucitante')->name('remitente.crear');
Route::post('tramite/solicitantes-guardar', 'TramiteController@GuardarSolicitante')->name('remitente.guardar');
//modal-remitente fin//

//modal-empresa inicio//
Route::get('tramite/empresa-create', 'TramiteController@CrearEmpresa')->name('empresa.crear');
Route::post('tramite/empresa-guardar', 'TramiteController@GuardarEmpresa')->name('empresa.guardar');
//modal-empresa fin//

//modal-usuario inicio//
Route::get('tramite/usuario-create', 'TramiteController@CrearUsuario')->name('usuario.crear');
Route::post('tramite/usuario-guardar', 'TramiteController@GuardarUsuario')->name('usuario.guardar');
//modal-usuario fin//

Route::resource('tramite/area', 'AreaController');
Route::resource('tramite/remitente', 'RemitenteController');
Route::resource('tramite/tipo-usuario', 'TipoUsuarioController');
Route::resource('tramite/tipo-documentos', 'TipodocumentoController');
Route::resource('tramite/empresa', 'EmpresaController');
Route::resource('tramite/emitidos', 'EmitidosController');
Route::resource('tramite/control-documentos', 'ControldocumentosController');

Route::get('tramite/documentos-tipo-documentos', 'ReporteTipoDocumentoController@index');
Route::get('reporte/imprimir/{fecha_inicio}/{fecha_fin}/{tipo_tramite}/{tipoDocumento_id}', 'ReporteTipoDocumentoController@imprimir');

Route::get('tramite/reporte-tipo-tramite', 'ReporteTipoTramiteController@index');
Route::get('reporte/imprimir-tipo-tramite/{fecha_inicio}/{fecha_fin}/{tipo_tramite}', 'ReporteTipoTramiteController@imprimir');

Route::post('filter', 'FilterUsuarioController@index');

Route::post('filterTipoTramite', 'TipoTramiteController@index');

Route::get('solicitante', 'ObtenerRemitenteController@index');

Route::get('empresa', 'ObtenerEmpresaController@index');



