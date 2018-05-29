<?php

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

use App\Tecnico;
Auth::routes();

Route::get('/', 'MaestroController@login')->middleware('invitado');
Route::middleware('maestro')->group(function() {
  Route::get('/inicio/{maestro}', 'MaestroController@home')->name('inicio');
  Route::get('/inicio/{maestro}/logout', 'MaestroController@logout');
  Route::post('/inicio/solicitud', 'SolicitudController@crea');
});
Route::get('/google', 'MaestroController@redirectToProvider');
Route::get('/google/callback', 'MaestroController@handleProviderCallback');

Route::middleware('guest:web')->group(function() {
  Route::get('/sam-admin', 'TecnicoController@login');
});
Route::post('/sam-admin/login', 'TecnicoController@entrar');

Route::middleware('auth:web')->group(function() {
  Route::get('/sam-admin/tecnico', 'TecnicoController@inicio')->name('home');
  Route::get('/sam-admin/registra_tecnico', 'TecnicoController@registro');
  Route::post('/sam-admin/registra_tecnico', 'TecnicoController@guarda');
  Route::get('/sam-admin/logout', 'TecnicoController@logout');
  Route::get('/sam-admin/lista_tecnicos', 'TecnicoController@lista');
  Route::get('/sam-admin/mantenimientos', 'TecnicoController@mants');
  Route::get('/sam-admin/pdf', 'TecnicoController@creaPDF');
  Route::get('/sam-admin/mail', 'TecnicoController@email');
  Route::get('/sam-admin/pendientes', 'TecnicoController@pendientes');
  Route::get('/sam-admin/documentos', 'TecnicoController@documentos');
  Route::get('/sam-admin/equipo', 'TecnicoController@equipo');
  Route::get('/sam-admin/registra_maestro', 'TecnicoController@agrega_maestro');
  Route::patch('/sam-admin/update_sol/{solicitud}', 'TecnicoController@act_solicitud');
  Route::post('/sam-admin/horario/{tecnico}', function(Tecnico $tecnico) {
    $horario = $tecnico->horario;
    $nombre = $tecnico->nombre;
    return response()->json([
      'success' => 'Se ha recuperado con éxito',
      'name' => $nombre,
      'view' => view('layouts.interfaz.horario', compact('horario'))->render()
    ]);
  });
  Route::post('/sam-admin/get_docs/{anio}', 'TecnicoController@getDocs');
  Route::post('/sam-admin/lista_docs', 'TecnicoController@listaDocs');
  Route::post('/sam-admin/registra_equipo', 'EquipoController@inserta');
  Route::patch('/sam-admin/tecnicos/{tecnico}', function(Tecnico $tecnico) {
    $tecnico->update(['activo' => 0]);
    \App\Solicitud::where('estado', 0)->update(['tecnico_id' => null]);
    $tecnicos = \App\Tecnico::all();
    return response()->json([
      'success' => 'Se ha borrado con éxito',
      'msg' => view('layouts.interfaz.tabla_tecnicos', compact('tecnicos'))->render()
    ]);
  });
});