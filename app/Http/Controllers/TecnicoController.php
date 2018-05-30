<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mikehaertl\pdftk\Pdf;
use \App\Solicitud as Solicitud;

class TecnicoController extends Controller
{
    public function login() {
      return view('tecnicos.login');
    }

    public function inicio() {
      $seleccionado = 1;
      if(auth()->guard('web')->user()->tipo_usuario == 1) {
        $tecnicos = \App\Tecnico::all();
        $maestros = \App\Maestro::all();
        $solicitudes = \App\Solicitud::where('estado', 0)->get();
        return view('tecnicos.inicio', compact('tecnicos', 'seleccionado', 'maestros', 'solicitudes'));
      } else {
        $sols_individuales = Solicitud::where('tecnico_id', auth()->guard('web')->user()->id)->where('estado', 0)->get();
        return view('tecnicos.inicio_tecnico', compact('sols_individuales', 'seleccionado'));
      }
    }

    public function entrar(Request $request) {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);

      if(!Auth::guard('web')->attempt(request(['email', 'password']))) {
        return back()->withErrors([
          "message" => "Ha ocurrido un error con las credenciales"
        ]);
      }
      return redirect()->home();
    }

  public function registro() {
      $seleccionado = 4;
      return view('tecnicos.registra_tecnico', compact('seleccionado'));
    }

    public function guarda() {
      $this->validate(request(), [
        'nombre' => 'required',
        'ap_pat' => 'required',
        'ap_mat' => 'required',
        'matricula' => 'required',
        'email' => 'required|email',
        'num_huella' => 'required',
        'telefono' => array(
          'required',
          'regex:/(\(\d{3}\)\ \d{3}\-\d{4})/u'
        ),
        'hrs_lunes' => 'required',
        'hrs_martes' => 'required',
        'hrs_miercoles' => 'required',
        'hrs_jueves' => 'required',
        'hrs_viernes' => 'required',
        'tipo_usuario' => 'required',
      ]);

      $tecnico = \App\Tecnico::create(request(['nombre', 'ap_pat', 'ap_mat', 'matricula', 'telefono', 'email', 'tipo_usuario', 'num_huella']) + ['password' => bcrypt('holo')] + ['activo' => 1]);
      if($tecnico) {
        \App\Horario::create(request(['hrs_lunes', 'hrs_martes', 'hrs_miercoles', 'hrs_jueves', 'hrs_viernes']) + ['tecnico_id' => $tecnico->id]);
      }
      $response = array(
        'status' => 'success',
        'msg' => 'Setting created successfully',
      );
      return \Response::json($response);
    }

    public function logout() {
      Auth::logout();
      return redirect('/sam-admin');
    }

    public function lista() {
      $seleccionado = 5;
      $tecnicos = \App\Tecnico::all();
      return view('tecnicos.lista_tecnicos', compact('tecnicos', 'seleccionado'));
    }

    public function mants() {
      \Carbon\Carbon::setLocale('es');
      $seleccionado = 7;
      $mants = \App\Solicitud::whereNull('tecnico_id')->get();
      $tecs = \App\Tecnico::where('activo', 1)->where('tipo_usuario', 2)->get();
      return view('tecnicos.mantenimientos', compact('seleccionado', 'mants', 'tecs'));
    }

    public function act_solicitud(Solicitud $sol) {
      $solicitud = \App\Solicitud::where('id', request('id'))->first();
      $solicitud->update([
        'tecnico_id' => request('tecnico_id')
      ]);
      \Mail::to($solicitud->tecnico)->send(new \App\Mail\MantenimientoAsignado($solicitud));
      return response()->json([
        'success' => 'Se ha actualizado con éxito'
      ]);
    }

    public function crea_tarea() {
      $seleccionado = 9;
      $equipos = \App\Equipo::all();
      $maestros = \App\Maestro::all();
      $tecs = \App\Tecnico::all();
      return view('tecnicos.crea_tarea', compact('seleccionado', 'maestros', 'equipos', 'tecs'));
    }

    public function inserta_tarea() {
      \App\Solicitud::create(
        request(['maestro_id']) +
        ['fecha_cita' => date('Y-m-d H:i:s')] +
        ['estado' => 0] +
        ['tipo_tarea' => 1] +
        ['descripcion' => request('descripcion')] +
        ['ruta_sar' => null]);
        return back();
    }

    public function pendientes() {
      $seleccionado = 6;
      $tecnicos = \App\Tecnico::where('activo', 1)->where('tipo_usuario', 2)->get();
      return view('tecnicos.pendientes', compact('seleccionado', 'tecnicos'));
    }

    public function documentos() {
      $seleccionado = 8;
      $anios = \App\Solicitud::selectRaw('year(created_at) year')
                ->groupBy('year')
                ->orderByRaw('min(created_at) desc')
                ->get();
      return view('tecnicos.documentos', compact('seleccionado', 'anios'));
    }

    public function getDocs() {
      $sols = \App\Solicitud::selectRaw('year(created_at) year, monthname(created_at) month, count(*) solicitados')
              ->where('estado', 1)
              ->whereYear('created_at', request('anio'))
              ->groupBy('year', 'month')
              ->orderByRaw('min(created_at) asc')
              ->get();
      
      return view('layouts.interfaz.docs', compact('sols'));
    }

    public function modifica_tecnico($id) {
      $tecnico = \App\Tecnico::find($id)->update([
        'nombre' => request('nombre'),
        'ap_pat' => request('ap_pat'),
        'ap_mat' => request('ap_mat'),
        'matricula' => request('matricula'),
        'email' => request('email'),
        'tipo_usuario' => request('tipo'),
        'num_huella' => request('huella')
      ]);

      return response()->json([
        'success' => 'Se ha modificado con éxito'
      ]);
    }

    public function listaDocs() {
      $solicitudes = \App\Solicitud::latest();
      if($mes = request('mes')) {
        $solicitudes->whereMonth('created_at', \Carbon\Carbon::parse($mes)->month);
      }

      if($anio = request('anio')) {
        $solicitudes->whereYear('created_at', $anio);
      }

      $solicitudes = $solicitudes->get();
      return view('layouts.interfaz.lista_docs', compact('solicitudes'));
    }

    public function equipo() {
      $seleccionado = 10;
      $maestros = \App\Maestro::all();
      return view('tecnicos.equipo', compact('seleccionado', 'maestros'));
    }
}
