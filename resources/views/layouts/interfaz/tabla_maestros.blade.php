<table class="table table-striped">
    <thead>
      <tr>
        <th class="font-weight-bold">Nombre(s)</th>
        <th class="font-weight-bold">Apellido(s)</th>
        <th class="font-weight-bold"># empleado</th>
        <th class="font-weight-bold">Correo</th>
        <th class="font-weight-bold">Activo</th>
        <th class="font-weight-bold">Equipo</th>
        <th class="font-weight-bold">Extensión de cubículo</th>
        <th class="font-weight-bold">Ubicación</th>
        <th class="font-weight-bold">Guardar Cambios</th>
        <th class="font-weight-bold">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($maestros as $maestro)
        <tr>
          <td>
            <input type="text" id="nombre_maestro_{{$maestro->id}}" class="form-control table-input" value="{{ $maestro->nombre }}">
          </td>
          <td>
            <input type="text" id="aps_maestro_{{$maestro->id}}" class="form-control table-input" value="{{ $maestro->ap_pat . ' ' . $maestro->ap_mat }}">  
          </td>
          <td>
            <input type="text" id="num_empleado_maestro_{{$maestro->id}}" class="form-control table-input" value="{{ $maestro->num_empleado }}">  
          </td>
          <td>
            <input type="text" id="email_maestro_{{$maestro->id}}" class="form-control table-input" value="{{ $maestro->email }}">
          </td>
          <td>
            @if($maestro->activo)
              <p class="h6" id="act_maestro_{{$maestro->id}}">Sí</p>
            @else
              <p class="h6" id="act_maestro_{{$maestro->id}}">No</p>
            @endif
          </td>
          <td>
            @if(count($maestro->equipo))
              <select name="equipo_maestro_{{$maestro->id}}" required id="equipo_maestro_{{$maestro->id}}" class="mdb-select select_tipo">
                @foreach($maestro->equipo as $equipo)
                  <option value="{{$equipo->id}}">{{$equipo->marca . ' ' . $equipo->modelo}}</option>
                @endforeach
              </select>
            @else
              <p class="h6">No hay equipo asignado.</p>
            @endif
          </td>
          <td><input type="text" id="extension_maestro_{{$maestro->id}}" class="form-control table-input" value="{{ $maestro->extension_cubo }}"></td>
          <td><input type="text" id="ubicacion_maestro_{{$maestro->id}}" class="form-control table-input" value="{{ $maestro->ubicacion }}"></td>
          <td>
            <form method="post">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <a href="#" id="modifica_maestro_{{$maestro->id}}" data-id="{{$maestro->id}}" class="btn btn-success btn-sm mod_maestro"><i class="fa fa-cog"></i></a>
            </form>
          </td>
          <td>
            <form method="POST">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <a href="#" id="borra_maestro_{{ $maestro->id }}" data-id="{{ $maestro->id }}" class="btn btn-sm btn-danger del_maestro">
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
            <p>¿Desea dar de baja a {{$maestro->nombre}}?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger">Sí</button>
          </div>
        </div>
      </div>
    </div> --}}