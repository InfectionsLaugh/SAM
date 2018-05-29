<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    public static function creaHorario(Request $r) {
      $horario = new Horario;

      $horario->hrs_lunes = $r->hrs_lunes;
      $horario->hrs_martes = $r->hrs_martes;
      $horario->hrs_mier = $r->hrs_mier;
      $horario->hrs_jueves = $r->hrs_jueves;
      $horario->hrs_vie = $r->hrs_vie;

      $horario->save();
    }
}
