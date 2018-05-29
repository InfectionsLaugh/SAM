<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Maestro extends Authenticatable
{
    protected $guard = 'maestro';
    protected $table = "maestros";
    protected $guarded = [];
    protected $redirectTo = '/';
    protected $hidden = [
      'remember_token'
    ];

    public function equipo() {
      return $this->hasMany(Equipo::class);
    }

    public function solicitudes() {
      return $this->hasMany(Solicitud::class);
    }
}
