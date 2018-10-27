<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
  protected $fillable = ['prueba'];

  public function preguntas(){
    return $this->hasMany(Pregunta::class);
  }
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function cuento(){
    return $this->belongsTo(Cuento::class);
  }
  public function resultados(){
    return $this->hasMany(Resultado::class);
  }
}
