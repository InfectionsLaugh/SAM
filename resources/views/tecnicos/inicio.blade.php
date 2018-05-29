@extends ('layouts.tecnicos.master')

@section ('content')
@include ('layouts.interfaz.nav')
<div class="row">
  <div class="col-md-5 col-xs-12">
    @include('layouts.widgets.tecnicos')
  </div>
  <div class="col-md-7 col-xs-12">
    @include('layouts.widgets.mantenimientos')
  </div>
</div>
@endsection