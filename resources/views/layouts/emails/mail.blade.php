<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  El profesor {{ $solicitud->maestro->nombre }} ha solicitado un nuevo mantenimiento el día {{ \Carbon\Carbon::parse($solicitud->fecha_cita)->toFormattedDateString() }}
</body>
</html>