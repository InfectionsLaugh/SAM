<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
  protected $guarded = [];
  protected $table = 'equipo';

  public function maestro() {
    return $this->belongsTo(Maestro::class);
  }
}
