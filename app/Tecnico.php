<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tecnico extends Authenticatable
{
  use Notifiable;
  protected $guard = 'web';
  protected $table = 'tecnicos';
  protected $guarded = [];


  public function solicitudes() {
    return $this->hasMany(Solicitud::class);
  }

  public function horario() {
    return $this->hasOne(Horario::class);
  }
}
