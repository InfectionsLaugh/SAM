@foreach ($sols as $sol)
  <div class="col-md-2">
    <button class="btn btn-primary mes" data-year="{{$sol->year}}" id="{{$sol->month}}">{{ substr($sol->month, 0, 3) }} ({{$sol->solicitados}})</button>
  </div>
@endforeach