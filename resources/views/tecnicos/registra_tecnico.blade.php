@extends ('layouts.tecnicos.master')

@section('content')
@include ('layouts.interfaz.nav')
<h3>Registrar Técnico</h3>
<form method="POST">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-3 col-xs-6">
      <div class="md-form"><input type="text" required name="nombre" id="nombre" class="form-control"><label for="nombre">Nombre</label></div>
    </div>
    <div class="col-md-3 col-xs-6">
      <div class="md-form"><input type="text" required name="ap_pat" id="ap_pat" class="form-control"><label for="ap_pat">Apellido paterno</label></div>
    </div>
    <div class="col-md-3 col-xs-12">
      <div class="md-form"><input type="text" required name="ap_mat" id="ap_mat" class="form-control"><label for="ap_mat">Apellido materno</label></div>
    </div>
    <div class="col-md-3 col-xs-12">
      <div class="md-form"><input type="text" required name="telefono" id="telefono" class="form-control"><label for="telefono">Número de teléfono <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="El número de teléfono debe coincidir con el formato (xxx) xxx-xxxx."></i></label></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 col-xs-6">
      <div class="md-form"><input type="text" required name="matricula" id="matricula" class="form-control"><label for="matricula">Matrícula</label></div>
    </div>
    <div class="col-md-3 col-xs-6">
      <div class="md-form">
        <div class="col-md-6">
          <div class="md-for">
            <input type="email" name="email" id="email" class="form-control">
            <label for="email">Correo</label>
          </div>
        </div>
        <div class="col-md-6">
          <label for="">@uabc.edu.mx</label>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-xs-6">
      <div class="md-form">
        <select name="tipo_usuario" required id="tipo_usuario" class="mdb-select">
          <option value="" disabled selected>Tipo de usuario</option>
          <option value="1">Administrador</option>
          <option value="2">Técnico</option>
        </select>
      </div>
    </div>
    <div class="col-md-3 col-xs-6">
      <div class="md-form"><input type="text" required name="num_huella" id="num_huella" class="form-control"><label for="num_huella"># de huella</label></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2 m-b-0">
      <div class="md-form">
        <label for="hrs_lunes" class="active">Hrs. Lunes</label>
        <div class="row">
          <div class="col"><input type="text" required name="hrs_lunes" id="hrs_lunes" class="form-control"></div>
          <h2>-</h2>
          <div class="col"><input type="text" required name="hrs_lunes_fin" id="hrs_lunes_fin" class="form-control"></div>
        </div>
      </div>
    </div>
    <div class="col-md-2 m-b-0">
      <div class="md-form">
        <label for="hrs_martes" class="active">Hrs. Martes</label>
        <div class="row">
          <div class="col"><input type="text" required name="hrs_martes" id="hrs_martes" class="form-control"></div>
          <h2>-</h2>
          <div class="col"><input type="text" required name="hrs_martes_fin" id="hrs_martes_fin" class="form-control"></div>
        </div>
      </div>
    </div>
    <div class="col-md-2 m-b-0">
      <div class="md-form">
        <label for="hrs_mier" class="active">Hrs. Miércoles</label>
        <div class="row">
          <div class="col"><input type="text" required name="hrs_miercoles" id="hrs_miercoles" class="form-control"></div>
          <h2>-</h2>
          <div class="col"><input type="text" required name="hrs_miercoles_fin" id="hrs_miercoles_fin" class="form-control"></div>
        </div>
      </div>
    </div>
    <div class="col-md-2 m-b-0">
      <div class="md-form">
        <label for="hrs_jueves" class="active">Hrs. Jueves</label>
        <div class="row">
          <div class="col"><input type="text" required name="hrs_jueves" id="hrs_jueves" class="form-control"></div>
          <h2>-</h2>
          <div class="col"><input type="text" required name="hrs_jueves_fin" id="hrs_jueves_fin" class="form-control"></div>
        </div>
      </div>
    </div>
    <div class="col-md-2 m-b-0">
      <div class="md-form">
        <label for="hrs_vie" class="active">Hrs. Viernes</label>
        <div class="row">
          <div class="col"><input type="text" required name="hrs_viernes" id="hrs_viernes" class="form-control"></div>
          <h2>-</h2>
          <div class="col"><input type="text" required name="hrs_viernes_fin" id="hrs_viernes_fin" class="form-control"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="md-form">
    <div class="row">
      <div class="col"><button type="submit" id="exito" class="btn btn-success">Registrar Técnico</button></div>
    </div>
  </div>

  @include('layouts.errores.errores')
</form>
@endsection