@extends('layouts.tecnicos.master')

@section('content')
  @include('layouts.interfaz.nav')

  <form action="/sam-admin/crea_tarea" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-4">
        <div class="md-form">
          <select name="tipo" id="tipo" class="mdb-select">
            <option value="1" selected>Mantenimiento Preventivo</option>
            <option value="2">Mantenimiento Correctivo</option>
            <option value="3">Formateo</option>
            <option value="4">Instalación de Software Básico</option>
            <option value="5">Inventario</option>
            <option value="6">Fallas</option>
          </select>
          <label for="tipo">Tipo de tarea</label>
        </div>
        <div class="md-form m-t-2">
          <input type="text" name="fecha_creacion" id="fecha_creacion" value="{{\Carbon\Carbon::now()->format('l jS \\of F Y')}}" class="form-control">
          <label for="fecha_creacion">Fecha de creación</label>
        </div>
      </div>
      <div class="col-md-8">
        <div class="md-form">
          <textarea type="text" id="descripcion" name="descripcion" class="form-control md-textarea" rows="3"></textarea>
          <label for="descripcion">Descripción</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="md-form">
          <select name="equipo_tarea" id="equipo_tarea" class="mdb-select">
            <option value="" selected disabled>Seleccione un equipo</option>
            @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->marca . ' ' . $equipo->modelo}}</option>
            @endforeach
          </select>
          <label for=""></label>
        </div>
      </div>
      <div class="col-md-4">
        <div class="md-form">
          <select name="tec_tarea" id="tec_tarea" class="mdb-select">
            <option value="" selected disabled>Seleccione un técnico</option>
            @foreach($tecs as $tec)
              <option value="{{$tec->id}}">{{$tec->nombre . ' ' . $tec->ap_pat}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="md-form">
          <select name="maestro_tarea" id="maestro_tarea" class="mdb-select">
            <option value="" selected disabled>Seleccione un maestro</option>
            @foreach($maestros as $maestro)
              <option value=" {{$maestro->id}} "> {{$maestro->nombre . ' ' . $maestro->ap_pat}} </option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <p class="h5">Usa SAR</p>
        <div class="form-check mb-4">
          <input class="form-check-input" type="radio" name="usa_sar" id="usa_sar1" value="option1" checked>
          <label class="form-check-label" for="usa_sar1">
              Sí
          </label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="radio" name="usa_sar" id="usa_sar2" value="option2">
          <label class="form-check-label" for="usa_sar2">
              No
          </label>
        </div>
      </div>
      <div class="col-md-3"><button class="btn btn-success" id="crea_tarea">Crear Tarea</button></div>
    </div>
  </form>
@endsection