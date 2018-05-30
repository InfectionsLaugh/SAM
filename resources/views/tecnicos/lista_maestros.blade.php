@extends ('layouts.tecnicos.master')

@section('content')
  @include('layouts.interfaz.nav')
  <div class="container">
    <h3>Lista de Maestros</h3>
    @if(count($maestros))
      <div id="maestros">
        @include('layouts.interfaz.tabla_maestros')
      </div>
    @else
      <h1>No hay maestros registrados en el momento</h1>
    @endif
  </div>
@endsection 