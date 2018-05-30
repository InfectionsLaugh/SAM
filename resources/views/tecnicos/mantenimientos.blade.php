@extends ('layouts.tecnicos.master')

@section('content')
  @include ('layouts.interfaz.nav')
  @if(count($mants))
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Docente</th>
          <th>Fecha sol.</th>
          <th>Estado</th>
          <th>Tipo Mant.</th>
          <th>Asignar técnico</th>
          <th>Guardar cambios</th>
          <th>Borrar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mants as $mant)
          <tr>
            @if(count($mant->maestro))
            <td>{{ $mant->maestro->nombre . ' ' . $mant->maestro->ap_pat }}</td>
            @else
            <td>N/A</td>
            @endif
            <td>{{ \Carbon\Carbon::parse($mant->fecha_cita)->toDateString() }}</td>
            @if($mant->estado == 0)
              <td>Sin Completar</td>
            @endif
            @if($mant->tipo_solicitud == 1)
              <td>Correctivo</td>
            @else
              <td>Preventivo</td>
            @endif
            <td>
              <input type="hidden" name="id" value="{{ $mant->id }}">
              <select class="mdb-select" name="tecnico_id" id="tecnico_id_{{ $mant->id }}">
                <option value="" disabled selected>Escoger técnico</option>
                @foreach ($tecs as $tec)
                <option value="{{ $tec->id }}">{{ $tec->nombre . ' ' . $tec->ap_pat }}</option>
                @endforeach
              </select>
            </td>
            <td>
              <form method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <button data-id="{{ $mant->id }}" class="btn btn-success updt-sol"><i class="fa fa-check"></i></button>
              </form>
              </td>
            <td>
              <form method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
    
                <button type="submit" id="borra_mant_{{ $mant->id }}" data-id="{{ $mant->id }}" class="btn btn-danger del_mant">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <h1>No hay tareas sin asignar por el momento.</h1>
  @endif
@endsection