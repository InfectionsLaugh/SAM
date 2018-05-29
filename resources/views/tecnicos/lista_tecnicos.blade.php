@extends('layouts.tecnicos.master')

@section('content')
  @include ('layouts.interfaz.nav')
  <div class="container">
    <h3>Lista de Usuarios</h3>
    @if(count($tecnicos))
      <div class="container" id="tabla">
        @include('layouts.interfaz.tabla_tecnicos')
      </div>
    @else
      <h1>No hay técnicos por el momento.</h1>
    @endif

    @if(count($tecnicos))
      
    </div>
  @endif
@endsection