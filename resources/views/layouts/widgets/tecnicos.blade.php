<div class="container">
  <div class="container">
    <div class="card">
      <div class="card-header unique-color darken-3 white-text">Técnicos</div>
      <div class="card-body p-a-0" id="tecnicos-admin-card">
        <div class="list-group">
          @if(count($tecnicos))
            @foreach ($tecnicos as $tecnico)
              <a href="#" data-toggle="modal" data-target="#exampleModal" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <img src="http://via.placeholder.com/50x50" class="round-image center-image" alt="">
                  <h5 class="mb-1">{{ $tecnico->nombre . ' ' .$tecnico->ap_pat . ' ' . $tecnico->ap_mat }}</h5>
                </div>
                <p class="mb-1">Correo: {{ $tecnico->email }}</p>
                <small>Click para ver más información</small>
              </a>
            @endforeach
          @else
            <h3>No hay técnicos registrados</h3>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

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