@extends('layouts.maestros.master')

@section ('content')
<div class="container">
  <form action="/inicio/solicitud" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="maestro_id" value="{{ $prof->id }}">
    {{-- Primer renglón de formulario de solicitud --}}
    <div class="row">
      <div class="col-md-6">
      <div class="row">
        <div class="col-sm-12">
          {{-- Formulario de datos personales --}}
          <p class="h4 text-center m-b-3 font-weight-bold">Datos del Solicitante</p>
          {{-- Primer renglón del formulario de datos personales --}}
          <div class="row">
            <div class="col-sm-6">
              <div class="md-form">
                <input type="text" name="nombre" id="nombreProf" class="form-control disabled" value="{{ $prof->nombre . ' ' . $prof->ap_pat . ' ' . $prof->ap_mat }}">
                <label for="nombre">Su nombre</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="md-form">
                <input type="text" name="ubicacion" id="ubicacionProf" class="form-control disabled" value="{{ $prof->ubicacion }}">
                <label for="ubicacion">Ubicación</label>
              </div>
            </div>
          </div> {{-- Fin de primer renglón --}}
          <div class="row">
            <div class="col-sm-6">
              <div class="md-form">
                <input type="text" name="extension" id="extension" class="form-control disabled" value="{{ $prof->extension_cubo }}">
                <label for="extension">Extensión de cubículo</label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="md-form">
                <input type="text" name="correo" id="correo" class="form-control disabled" value="{{ $prof->email }}">
                <label for="correo">Correo</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <p class="h4 text-center m-b-3 font-weight-bold">Datos del Equipo</p>
          <div class="row">
            <div class="col-sm-12">
              <select name="equipo" id="equipo" class="mdb-select">
                <option value="" selected>Escoja uno de sus equipos</option>
                @foreach ($prof->equipo as $equipo)
                  <option value="{{$equipo->num_control}}" data-marca="{{$equipo->marca}}" data-modelo="{{$equipo->modelo}}" data-pass="{{$equipo->password}}" data-ip="{{$equipo->dir_ip}}">{{$equipo->marca . ' ' . $equipo->modelo}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="md-form"><input type="text" name="dirIp" id="dirIp" class="form-control disabled" value="148.231.169.22"><label for="dirIp">Dirección IP</label></div>
            </div>
            <div class="col-sm-6">
              <div class="md-form"><input type="text" name="password" id="password" class="form-control disabled" value="kiss97"><label for="password">Contraseña</label></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="md-form"><input type="text" name="marca" id="marca" class="form-control disabled" value="Dell"><label for="marca">Marca</label></div>
            </div>
            <div class="col-sm-6">
              <div class="md-form"><input type="text" name="modelo" id="modelo" class="form-control disabled" value="Optiplex 7010"><label for="modelo">Modelo</label></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="row">
          <div class="col">
            <p class="h4 text-center m-b-3 font-weight-bold">Datos del Servicio</p>
            <div class="row">
              <div class="col-sm-4">
                <div class="md-form">
                  <input type="text" class="form-control disabled" name="fecha_cita" id="fechaSolicitud" value="{{ \Carbon\Carbon::now()->format('d\\/F\\/Y') }}"><label for="fechaSolicitud">Fecha de solicitud</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="md-form">
                  <textarea type="text" class="form-control md-textarea" name="descProblema" id="descProblema"></textarea><label for="descProblema">Descripción del problema</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="md-form"><button id="enviar" class="btn btn-success" value="Solicitar mantenimiento">Solicitar Mantenimiento</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.errores.errores')
  </form>
</div>
@endsection