@extends ('layouts.maestros.master')

@section ('content')
  <div class="jumbotron">
    <form action="/google" method="GET">
      <h1 class="display-4">¡Bienvenido a SAM!</h1>
      <p class="lead">Para solicitar nuestros servicios de soporte técnico debe iniciar sesión. Puede hacerlo utilizando el botón de abajo</p>
      <hr class="my-4">
      <p class="lead text-center">
      <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-google"></i> Iniciar sesión</button>
      </p>
      @include('layouts.errores.errores')
    </form>
  </div>
@endsection