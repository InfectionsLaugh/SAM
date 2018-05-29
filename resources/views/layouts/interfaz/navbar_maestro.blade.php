<nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color">
  <a class="navbar-brand" href="#">S.A.M</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        {{ $prof->nombre . ' ' . $prof->ap_pat }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/inicio/'.$prof->email.'/logout') }}"> <i class="fa fa-sign-out"></i> Cerrar sesión</a>
        </div>
      </li>
    </ul>
  </div>
</nav>