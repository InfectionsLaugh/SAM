@extends('layouts.tecnicos.master')

@section('content')
  @include('layouts.interfaz.nav')
  @if(count($tecnicos))
    <p class="h4">Mantenimientos pendientes</p>
    <div class="card-deck">
      @foreach($tecnicos as $tecnico)
      @if($tecnico->tipo_usuario != 2)
        <div class="col-md-4 m-b-2">
          @if(count($tecnico->solicitudes))
            <div class="card">
              <div class="card-header deep-orange lighten-1 white-text">{{ $tecnico->nombre }}</div>
              <div class="card-body p-a-0 mantenimientos_tecnico" style="max-height: 350px">
                  <div class="list-group">
                    @foreach ($tecnico->solicitudes as $solicitud)
                      <a href="#" role="tabpanel" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Prof. {{ $solicitud->maestro->nombre . ' ' . $solicitud->maestro->ap_pat . ' ' . $solicitud->maestro->ap_mat}}</h5>
                          @if($solicitud->created_at->diffInDays() == 0)
                            <small>Hoy</small>
                          @else
                            <small>Hace {{ $solicitud->created_at->diffInDays() }} días</small>
                          @endif
                        </div>
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                          <i class="fa fa-star"></i>
                          Marcar como completado
                        </button>
                      </a>
                    @endforeach
                  </div>
              </div>
            </div>
            @else
            <div class="card">
              <div class="card-header deep-orange lighten-1 white-text">{{ $tecnico->nombre }}</div>
              <div class="card-body mantenimientos_tecnico" style="max-height: 350px">
                <p class="h4">{{ $tecnico->nombre }} no tiene mantenimientos pendientes.</p>
              </div>
            </div>
            @endif
          </div>
        @endif
      @endforeach
    </div>
  @endif
@endsection