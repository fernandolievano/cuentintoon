<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['pregunta'];

    public function respuestas(){
      return $this->hasMany(Respuesta::class);
    }
    public function prueba(){
      return $this->belongsTo(Prueba::class);
    }

}
