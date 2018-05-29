<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function inserta() {
      $this->validate(request(), [
        'maestro_id' => 'required',
        'descripcion' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'observaciones' => 'required'
      ]);

      \App\Equipo::create(request([
        'maestro_id',
        'serie',
        'num_control',
        'descripcion',
        'marca',
        'modelo',
        'dir_ip',
        'observaciones'
      ]));

      return response()->json([
        'success' => 'Se ha registrado con éxito'
      ]);
    }
}
