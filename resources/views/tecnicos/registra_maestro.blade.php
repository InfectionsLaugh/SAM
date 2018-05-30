@extends('layouts.tecnicos.master')

@section('content')
  @include('layouts.interfaz.nav')
  <p class="h2">Agregar nuevo maestro</p>
  <form method="post">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-3">
        <div class="md-form"><input type="text" required name="nombre_maestro" id="nombre_maestro" class="form-control"><label for="nombre_maestro">Nombre</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form"><input type="text" required name="ap_pat_maestro" id="ap_pat_maestro" class="form-control"><label for="ap_pat_maestro">Apellido Paterno</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form"><input type="text" required name="ap_mat_maestro" id="ap_mat_maestro" class="form-control"><label for="ap_mat_maestro">Apellido Materno</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form"><input type="text" required name="email_maestro" id="email_maestro" class="form-control"><label for="email_maestro">Correo electrónico</label></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="md-form"><input type="text" required name="num_empleado" id="num_empleado" class="form-control"><label for="num_empleado">Número de empleado</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form"><input type="text" required name="extension_maestro" id="extension_maestro" class="form-control"><label for="extension_maestro">Extensión de cubículo</label></div>
      </div>
      <div class="col-md-3">
        <div class="md-form">
          <select name="edificio" id="edificio" class="mdb-select">
            <option value="" disabled selected>Edificio</option>
            <option value="6A">6A</option>
            <option value="6B">6B</option>
            <option value="6C">6C</option>
            <option value="6D">6D</option>
            <option value="6E">6E</option>
            <option value="6F">6F</option>
            <option value="6G">6G</option>
          </select>
          <label for="edificio">Edificio</label>
        </div>
      </div>
      <div class="col-md-3">
        <div class="md-form">
          <select name="planta" id="planta" class="mdb-select">
            <option value="" disabled selected>Planta</option>
            <option value="P/A">Planta Alta</option>
            <option value="P/B">Planta Baja</option>
          </select>
          <label for="planta">Piso</label>
        </div>
      </div>
    </div>
    <div class="md-form"><button class="btn btn-success" id="registra_maestro">Registrar Maestro</button></div>
  </form>
@endsection