<nav id="sidebar">
  <div class="sidebar-header">
    <img src="http://via.placeholder.com/65x65" class="round-image" alt="">
    <h3 class="m-b-0">{{auth()->guard('web')->user()->nombre}}</h3>
    <small class="m-t-0"><a href="{{ url('sam-admin/logout') }}"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></small>
  </div>

  <ul class="list-unstyled components">
    @if($seleccionado == 1)
      <li class="active"><a href="#"> <i class="fa fa-home"></i> Inicio</a></li>
    @else
      <li><a href="{{ url('sam-admin/tecnico') }}"> <i class="fa fa-home"></i> Inicio</a></li>
    @endif
    <li>
      <a href="#maestrosSubmenu" class="sidebar-collapse" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-users"></i> Maestros </a>
      @if($seleccionado == 2 || $seleccionado == 3)
        <ul class="list-unstyled" id="maestrosSubmenu">
      @else
        <ul class="collapse list-unstyled" id="maestrosSubmenu">
      @endif
      @if($seleccionado == 2)
        <li class="active"><a href="{{ url('/sam-admin/registra_maestro') }}">Registrar maestro</a></li>
      @else
        <li><a href="{{ url('/sam-admin/registra_maestro') }}">Registrar maestro</a></li>
      @endif
      @if($seleccionado == 3)
        <li class="active"><a href="{{ url('/sam-admin/lista_maestros') }}">Lista de maestros</a></li>
      @else
        <li><a href="{{ url('/sam-admin/lista_maestros') }}">Lista de maestros</a></li>
      @endif
      </ul>
    </li>
    @if(auth()->guard('web')->user()->tipo_usuario == 1)
    <li>
      <a href="#tecnicosSubmenu" class="sidebar-collapse" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-user"></i> Técnicos </a>
      @if($seleccionado == 4 || $seleccionado == 5)
        <ul class="list-unstyled" id="tecnicosSubmenu">
      @else
        <ul class="collapse list-unstyled" id="tecnicosSubmenu">
      @endif
      @if($seleccionado == 4)
        <li class="active"><a href="#">Registrar técnico</a></li>
      @else
        <li><a href="{{ url('sam-admin/registra_tecnico') }}">Registrar técnico</a></li>
      @endif
      @if($seleccionado == 5)
        <li class="active"><a href="#">Lista de técnicos</a></li>
      @else
        <li><a href="{{ url('sam-admin/lista_tecnicos') }}">Lista de técnicos</a></li>
      @endif
      </ul>
    </li>
    <li>
      <a href="#mantenimientoSubmenu" class="sidebar-collapse" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-cog"></i> Tareas </a>
        @if($seleccionado >= 6 && $seleccionado <= 9)
          <ul class="list-unstyled" id="mantenimientoSubmenu">
        @else
          <ul class="collapse list-unstyled" id="mantenimientoSubmenu">
        @endif
        @if($seleccionado == 9)
          <li class="active"><a href="#" class="nav-link">Crear nueva tarea</a></li>
        @else
          <li><a href=" {{ url('/sam-admin/crea_tarea') }} " class="nav-link">Crear nueva tarea</a></li>
        @endif
        @if($seleccionado == 8)
        <li class="active">
          <a class="nav-link" href="#"> Completadas </a>
        </li>
        @else
          <li>
            <a class="nav-link" href=" {{ url('/sam-admin/documentos') }} "> Completadas </a>
          </li>
        @endif
        @if($seleccionado == 7)
          <li class="active"><a href="#">Asignar tarea</a></li>
        @else
          <li><a href="{{ url('sam-admin/mantenimientos') }}">Asignar tarea</a></li>
        @endif
        @if($seleccionado == 6)
          <li class="active"><a href="#">Pendientes</a></li>
        @else
          <li><a href="{{ url('sam-admin/pendientes') }}">Pendientes</a></li>
        @endif
      </ul>
    </li>
    @endif
    @if($seleccionado == 10)
      <li class="nav-item active"><a href="#"><i class="fa fa-desktop"></i> Equipo</a></li>
    @else
      <li class="nav-item"><a href=" {{ url('/sam-admin/equipo') }} "><i class="fa fa-desktop"></i> Equipo</a></li>
    @endif
  </ul>
</nav>