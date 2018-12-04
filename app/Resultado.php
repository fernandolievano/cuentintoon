<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = ['resultado'];

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function prueba(){
      return $this->belongsTo(Prueba::class);
    }
}
