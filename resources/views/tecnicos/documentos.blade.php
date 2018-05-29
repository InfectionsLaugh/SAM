@extends('layouts.tecnicos.master')

@section('content')
  @include('layouts.interfaz.nav')
  <div class="container m-a-2">
    @foreach ($anios as $anio)
      <button class="btn btn-success btn-lg anio" id="{{$anio->year}}">
        {{ $anio->year }}
      </button>
    @endforeach
  </div>
  
  <div class="container m-a-2" id="docs">

  </div>

  <div class="container" id="lista_docs">

  </div>
@endsection