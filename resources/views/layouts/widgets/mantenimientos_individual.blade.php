<div class="container">
@if(count($sols_individuales))
<div class="list-group">
  @foreach ($sols_individuales as $solicitud)
    <a href="#" role="tabpanel" class="list-group-item list-group-item-action flex-column align-items-start">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Prof. {{ $solicitud->maestro->nombre . ' ' . $solicitud->maestro->ap_pat . ' ' . $solicitud->maestro->ap_mat}}</h5>
      </div>
      <p class="mb-1">Este mantenimiento se te asignó en la fecha {{$solicitud->created_at->toDateString()}}</p>
      <button type="button" id="completa_sol_{{$solicitud->id}}" data-id="{{$solicitud->id}}" class="btn btn-info navbar-btn completa_soli">
        <i class="fa fa-star"></i>
        Marcar como completado
      </button>
    </a>
  @endforeach
</div>
@else
<a href="#" role="tabpanel" class="list-group-item list-group-item-action flex-column align-items-start">
  <div class="d-flex w-100 justify-content-between">
    <h5 class="mb-1">No tienes tareas pendientes</h5>
  </div>
</a>
@endif
</div>