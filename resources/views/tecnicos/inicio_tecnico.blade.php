@extends ('layouts.tecnicos.master')

@section ('content')
@include ('layouts.interfaz.nav')
<div class="row">
  <div class="col col-xs-12">
    @include('layouts.widgets.mantenimientos_individual')
  </div>
</div>
@endsection