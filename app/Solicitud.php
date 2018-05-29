<?php

namespace App;

class Solicitud extends Model
{
  protected $guarded = [];
  protected $table = 'solicitudes';
  
  public function maestro() {
    return $this->belongsTo(Maestro::class);
  }

  public function tecnico() {
    return $this->belongsTo(Tecnico::class);
  }
}
