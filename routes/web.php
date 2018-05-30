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
use App\Maestro;
use App\Solicitud;
use App\Equipo;

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
  Route::patch('/sam-admin/modifica_tecnico/{id}', 'TecnicoController@modifica_tecnico');
  Route::get('/sam-admin/mantenimientos', 'TecnicoController@mants');
  Route::get('/sam-admin/pdf', 'TecnicoController@creaPDF');
  Route::get('/sam-admin/crea_tarea', 'TecnicoController@crea_tarea');
  Route::get('/sam-admin/pendientes', 'TecnicoController@pendientes');
  Route::get('/sam-admin/documentos', 'TecnicoController@documentos');
  Route::get('/sam-admin/equipo', 'TecnicoController@equipo');
  Route::post('/sam-admin/crea_tarea', 'TecnicoController@inserta_tarea');
  Route::post('/sam-admin/sar_soli/{soli}', function(Solicitud $soli) {
    dd($soli);
    $ruta = $soli->ruta_sar;
    $nombre = $soli->maestro->nombre . ' ' . $soli->maestro->ap_pat . ' ' . $soli->maestro->ap_mat;
    $fecha = $soli->created_at->toDateString();

    return response()->json([
      'success' => 'Se ha recuperado con éxito',
      'view' => view('layouts.interfaz.sar', compact('ruta', 'nombre', 'fecha'))->render()
    ]);
  });
  Route::patch('/sam-admin/completa_tarea/{tarea}', function(Solicitud $tarea) {
    $tarea->update(['estado' => 1]);

    return response()->json([
      'success' => 'Se arma.'
    ]);
  });
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
  Route::get('/sam-admin/registra_maestro', 'MaestroController@registra_maestro');
  Route::post('/sam-admin/registra_maestro', 'MaestroController@crea_maestro');
  Route::get('/sam-admin/lista_maestros', 'MaestroController@lista_maestros');
  Route::patch('/sam-admin/act_maestro/{maestro}', function(Maestro $maestro) {
    $maestro->update([
      'nombre' => request('nombre'),
      'ap_pat' => request('ap_pat'),
      'ap_mat' => request('ap_mat'),
      'num_empleado' => request('num_empleado'),
      'email' => request('email'),
      'extension_cubo' => request('extension_cubo'),
      'ubicacion' => request('ubicacion')
    ]);

    return response()->json([
      'success' => 'Se ha modificado con éxito'
    ]);
  });
  Route::patch('/sam-admin/borra_maestro/{maestro}', function(Maestro $maestro) {
    $maestro->update(['activo' => 0]);
    Equipo::where('maestro_id', $maestro->id)->update(['maestro_id' => null]);
    $maestros = Maestro::all();

    return response()->json([
      'success' => 'Se ha dado de baja con éxito',
      'view' => view('layouts.interfaz.tabla_maestros', compact('maestros'))->render()
    ]);
  });
  Route::patch('/sam-admin/tecnicos/{tecnico}', function(Tecnico $tecnico) {
    $tecnico->update(['activo' => 0]);
    Solicitud::where('estado', 0)->update(['tecnico_id' => null]);
    $tecnicos = Tecnico::all();
    return response()->json([
      'success' => 'Se ha borrado con éxito',
      'msg' => view('layouts.interfaz.tabla_tecnicos', compact('tecnicos'))->render()
    ]);
  });
});