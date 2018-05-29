<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
    protected $guarded = [];

    public function tecnico() {
      $this->belongsTo(Tecnico::class);
    }
}
