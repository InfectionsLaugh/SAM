<div class="container">
    <div class="card">
      <div class="card-header unique-color lighten-1 white-text">Tareas pendientes</div>
      <div class="card-body p-a-0" id="mants-admin-card">
        @if(count($solicitudes))
        <div class="list-group">
          @foreach ($solicitudes as $solicitud)
            <a href="#" role="tabpanel" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Prof. {{ $solicitud->maestro->nombre . ' ' . $solicitud->maestro->ap_pat . ' ' . $solicitud->maestro->ap_mat}}</h5>
                @if($solicitud->created_at->diffInDays() == 0)
                  <small>Hoy</small>
                @else
                  <small>Hace {{ $solicitud->created_at->diffInDays() }} días</small>
                @endif
              </div>
              @if($solicitud->tecnico != null)
                <p class="mb-1">Técnico Encargado: {{ $solicitud->tecnico->nombre . ' ' . $solicitud->tecnico->ap_pat }}</p>
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                  <i class="fa fa-star"></i>
                  Marcar como completado
                </button>
              @else
                <p class="mb-1">No hay técnico asignado</p>
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                  <i class="fa fa-plus"></i>  
                  Asignar técnico
                </button>
              @endif
            </a>
          @endforeach
        </div>
        @else
          <p class="h4 text-center m-a-2">No hay tareas pendientes.</p>
        @endif
      </div>
    </div>
  </div>