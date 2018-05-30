<ul class="list-group" id="lista_docs">
  @if(count($solicitudes))
    @foreach($solicitudes as $solicitud)
      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          @if(count($solicitud->maestro))
          <h5 class="mb-1">Prof. {{ $solicitud->maestro->nombre . ' ' . $solicitud->maestro->ap_pat . ' ' . $solicitud->maestro->ap_mat}}</h5>
          @else
          <h5 class="mb-1">Descripción: {{$solicitud->descripcion}}</h5>
          @endif
          <small>Hace {{\Carbon\Carbon::parse($solicitud->fecha_cita)->diffInDays()}} días</small>
        </div>
        <p class="mb-1">Técnico encargado: {{ $solicitud->tecnico->nombre . ' ' . $solicitud->tecnico->ap_pat }}</p>
        <button class="btn btn-warning btn_sar" data-toggle="modal" data-target="#exampleModal" id="{{$solicitud->id}}">Ver SAR-008</button>
        <small>Asignado hace {{ $solicitud->updated_at->diffInDays() }} días </small>
      </a>
    @endforeach
  @else
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
      <p class="mb-1">No hay mantenimientos en este mes.</p>
    </a>
  @endif
</ul>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fluid" role="document">
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