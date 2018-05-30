<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Maestro;

use Socialite;

class MaestroController extends Controller
{
  public function login() {
    return view('maestros.login');
  }

  public function logout() {
    Auth::guard('maestro')->logout();
    return redirect('/');
  }

  public function home($maestro) {
    $prof = \App\Maestro::where('email', $maestro)->first();
    return view('maestros.home', compact('prof', 'user'));
  }

  public function lista_maestros() {
    $maestros = Maestro::all();
    $seleccionado = 3;
    return view('tecnicos.lista_maestros', compact('maestros', 'seleccionado'));
  }

  public function registra_maestro() {
    $seleccionado = 2;
    return view('tecnicos.registra_maestro', compact('seleccionado'));
  }

  public function crea_maestro() {
    $this->validate(request(), [
      'nombre' => 'required',
      'ap_pat' => 'required',
      'ap_mat' => 'required',
      'email' => 'required|email',
      'num_empleado' => 'required',
      'extension_cubo' => 'required',
      'ubicacion' => 'required'
    ]);

    Maestro::create(request(['nombre', 'ap_pat', 'ap_mat', 'email', 'num_empleado', 'extension_cubo', 'ubicacion']) + ['activo' => 1, 'password' => bcrypt('proyectos')]);

    return response()->json([
      'success' => 'Se ha registrado al maestro con éxito'
    ]);
  }

  public function redirectToProvider() {
    return Socialite::driver('google')->redirect();
  }

  public function handleProviderCallback() {
    $providerUser = Socialite::driver('google')->user();
    $creds = ['email' => $providerUser->email] + ['password' => 'proyectos'];
    if(\Auth::guard('maestro')->attempt($creds))
      return redirect()->action('MaestroController@home', ['maestro' => $providerUser->email, 'user' => $providerUser]);

    return redirect('/')->withErrors([
      'message' => 'Ha ocurrido un error iniciando sesión'
    ]);
  }
}
