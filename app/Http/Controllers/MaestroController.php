<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
