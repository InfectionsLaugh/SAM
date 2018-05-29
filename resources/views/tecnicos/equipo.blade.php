@extends('layouts.tecnicos.master')

@section('content')
  @include ('layouts.interfaz.nav')
  <form method="post">
    <div class="row">
      <div class="col-md-4">
        <select class="mdb-select" name="maestro_id" id="maestro_id">
          <option value="" disabled selected>Seleccione un docente</option>
          @foreach ($maestros as $maestro)
            <option value="{{$maestro->id}}" data-num="{{$maestro->num_empleado}}" data-email="{{$maestro->email}}"> {{$maestro->nombre . ' ' . $maestro->ap_pat}} </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <div class="md-form"><input type="text" name="numEmpleado" id="numEmpleado" class="form-control"><label class="datos-profe" for="numEmpleado"># de empleado</label></div>
      </div>
      <div class="col-md-4">
        <div class="md-form"><input type="text" name="email" id="email" class="form-control"><label class="datos-profe" for="email">Email</label></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="md-form"><input type="text" class="form-control" name="serie" id="serie"><label for="serie">Número de serie</label></div>
      </div>
      <div class="col-md-4">
        <div class="md-form"><input type="text" class="form-control" name="numero_control" id="numero_control"><label for="numero_control">Número de control patrimonial</label></div>
      </div>
      <div class="col-md-4">
        <div class="md-form">
            <select class="mdb-select" name="descripcion" id="descripcion">
              <option value="" disabled selected>Seleccione una descripción</option>
              <option value="1">Computadora de Escritorio</option>
              <option value="2">Laptop</option>
              <option value="3">Impresora/Scanner</option>
              <option value="4">Punto de Acceso</option>
              <option value="5">Switch</option>
              <option value="6">Router</option>
            </select>
          <label for="descripcion">Descripción</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="md-form"><input type="text" class="form-control" name="marca" id="marca"><label for="marca">Marca</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form"><input type="text" class="form-control" name="modelo" id="modelo"><label for="modelo">Modelo</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form"><input type="text" class="form-control" name="dir_ip" id="dir_ip"><label for="dir_ip">Dirección IP</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form"><input type="text" name="password" id="password" class="form-control"><label for="password">Contraseña</label></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="md-form"><textarea type="text" name="observaciones" id="observaciones" class="form-control md-textarea"></textarea><label for="observaciones">Observaciones</label></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="md-form"><button type="submit" class="btn btn-success" id="registraEquipo">Registrar Equipo</button></div>
      </div>
    </div>
  </form>
@endsection