<ul class="list-group" id="lista_docs">
  @if(count($solicitudes))
    @foreach($solicitudes as $solicitud)
      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{$solicitud->maestro->nombre . ' ' . $solicitud->maestro->ap_pat}}</h5>
          <small>Hace {{\Carbon\Carbon::parse($solicitud->fecha_cita)->diffInDays()}} días</small>
        </div>
        <p class="mb-1">Técnico encargado: {{ $solicitud->tecnico->nombre . ' ' . $solicitud->tecnico->ap_pat }}</p>
        <button class="btn btn-warning">Ver SAR-008</button>
        <small>Asignado hace {{ $solicitud->updated_at->diffInDays() }} días </small>
      </a>
    @endforeach
  @else
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
      <p class="mb-1">No hay mantenimientos en este mes.</p>
    </a>
  @endif
</ul>