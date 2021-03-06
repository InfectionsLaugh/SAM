<table class="table table-striped">
  <thead>
    <tr>
      <th class="font-weight-bold">Nombre(s)</th>
      <th class="font-weight-bold">Apellido(s)</th>
      <th class="font-weight-bold">Matrícula</th>
      <th class="font-weight-bold">Correo</th>
      <th class="font-weight-bold">Horario</th>
      <th class="font-weight-bold">Activo</th>
      <th class="font-weight-bold">Tipo de usuario</th>
      <th class="font-weight-bold"># de huella</th>
      <th class="font-weight-bold">Guardar Cambios</th>
      <th class="font-weight-bold">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tecnicos as $tecnico)
      <tr>
        <td>
          <input type="text" id="nombre_tecnico_{{$tecnico->id}}" class="form-control table-input" value="{{ $tecnico->nombre }}">
        </td>
        <td>
          <input type="text" id="aps_tecnico_{{$tecnico->id}}" class="form-control table-input" value="{{ $tecnico->ap_pat . ' ' . $tecnico->ap_mat }}">  
        </td>
        <td>
          <input type="text" id="matr_tecnico_{{$tecnico->id}}" class="form-control table-input" value="{{ $tecnico->matricula }}">  
        </td>
        <td>
          <input type="text" id="email_tecnico_{{$tecnico->id}}" class="form-control table-input" value="{{ $tecnico->email }}">
        </td>
        <td>
          <form method="post">
            <button type="button" id="{{$tecnico->id}}" class="btn btn-sm btn-success horario" data-toggle="modal" data-target="#exampleModal">Ver</button>
          </form>
        </td>
        <td>
          @if($tecnico->activo)
            <p class="h6" id="act_tecnico_{{$tecnico->id}}">Sí</p>
          @else
            <p class="h6" id="act_tecnico_{{$tecnico->id}}">No</p>
          @endif
        </td>
        <td>
          @if($tecnico->tipo_usuario == 1)
            <select name="tipo_usuario_{{$tecnico->id}}" required id="tipo_usuario_{{$tecnico->id}}" class="mdb-select select_tipo">
              <option value="1">Administrador</option>
              <option value="2">Técnico</option>
            </select>
          @else
            <select name="tipo_usuario_{{$tecnico->id}}" required id="tipo_usuario_{{$tecnico->id}}" class="mdb-select select_tipo">
              <option value="1">Administrador</option>
              <option value="2">Técnico</option>
            </select>
          @endif
        </td>
        <td><input type="text" id="huella_tecnico_{{$tecnico->id}}" class="form-control table-input" value="{{ $tecnico->num_huella }}"></td>
        <td>
          <form method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <a href="#" id="modifica_tecnico_{{$tecnico->id}}" data-id="{{$tecnico->id}}" class="btn btn-success btn-sm mod_tec"><i class="fa fa-cog"></i></a>
          </form>
        </td>
        <td>
          <form method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <a href="#" id="borra_tecnico_{{ $tecnico->id }}" data-id="{{ $tecnico->id }}" class="btn btn-sm btn-danger del_tec">
              <i class="fa fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Baja de técnico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Desea dar de baja a {{$tecnico->nombre}}?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger">Sí</button>
        </div>
      </div>
    </div>
  </div> --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>