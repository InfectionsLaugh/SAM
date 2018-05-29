@extends ('layouts.tecnicos.master')

@section ('content')
<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Iniciar sesión</h1>
    <hr class="my-4">
    <p class="lead">
    <form method="POST" action="/sam-admin/login">
      {{ csrf_field() }}
      <div class="form-group">
        <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
      </div>
      <div class="form-group">
        <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
      </div>
    </p>
    <div class="form-group">
      <p class="lead">
        <button type="reset" class="btn btn-success">Limpiar campos</button>
        <input type="submit" class="btn btn-primary" value="Iniciar sesión">
      </p>
    </div>
    @include('layouts.errores.errores')
    </div>
    </form>
  </div>
</div>
@endsection