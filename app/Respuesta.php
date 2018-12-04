<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['respuesta','correcta'];

    public function pregunta(){
      return $this->belongsTo(Pregunta::class);
    }
}
