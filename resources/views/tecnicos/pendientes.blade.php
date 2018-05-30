@extends('layouts.tecnicos.master')

@section('content')
  @include('layouts.interfaz.nav')
  @if(count($tecnicos))
    <p class="h4">Tareas pendientes</p>
    <div class="card-deck">
      @foreach($tecnicos as $tecnico)
        <div class="col-md-4 m-b-2">
          @if(count($tecnico->solicitudes))
            <div class="card">
              <div class="card-header deep-orange lighten-1 white-text">{{ $tecnico->nombre }}</div>
              <div class="card-body p-a-0 mantenimientos_tecnico" style="max-height: 350px">
                  <div class="list-group">
                    @foreach ($tecnico->solicitudes as $solicitud)
                      <a href="#" role="tabpanel" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          @if(count($solicitud->maestro))
                          <h5 class="mb-1">Prof. {{ $solicitud->maestro->nombre . ' ' . $solicitud->maestro->ap_pat . ' ' . $solicitud->maestro->ap_mat}}</h5>
                          @else
                          <h5 class="mb-1">Descripción: {{$solicitud->descripcion}}</h5>
                          @endif
                          @if($solicitud->created_at->diffInDays() == 0)
                            <small>Hoy</small>
                          @else
                            <small>Hace {{ $solicitud->created_at->diffInDays() }} días</small>
                          @endif
                        </div>
                        <form method="post">
                          {{csrf_field()}}
                          {{method_field('PATCH')}}
                          <button type="button" id="completa_sol_{{$solicitud->id}}" data-id="{{$solicitud->id}}" class="btn btn-info navbar-btn completa_soli">
                            <i class="fa fa-star"></i>
                            Marcar como completado
                          </button>
                        </form>
                      </a>
                    @endforeach
                  </div>
              </div>
            </div>
            @else
            <div class="card">
              <div class="card-header deep-orange lighten-1 white-text">{{ $tecnico->nombre }}</div>
              <div class="card-body mantenimientos_tecnico" style="max-height: 350px">
                <p class="h4">{{ $tecnico->nombre }} no tiene tareas pendientes.</p>
              </div>
            </div>
            @endif
          </div>
      @endforeach
    </div>
  @endif
@endsection