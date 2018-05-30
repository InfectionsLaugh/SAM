<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Hola, {{$solicitud->nombre}}, se te ha asignado una nueva tarea:</h3>
  <h3>Tipo: {{$solicitud->tipo_tarea}}</h3>
  <h3>Descripción: {{$solicitud->descripcion}}</h3>
  @if(count($solicitud->observaciones))
  <h3>Observaciones: {{$solicitud->observaciones}}</h3>
  @endif
  @if(count($solicitud->maestro))
  <h3>Maestro: {{$solicitud->maestro}}</h3>
  @endif
  @if(count($solicitud->equipo))
  <h3>Equipo: {{$solicitud->equipo}}</h3>
  @endif
</body>
</html>