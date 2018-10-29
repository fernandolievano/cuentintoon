<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuento extends Model
{
    protected $fillable = [
      'titulo','idprofesor','nivel','estado','autor','descripcion',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function paginas()
    {
      return $this->hasMany(Pagina::class);
    }
    public function pruebas()
    {
      return $this->hasMany(Prueba::class);
    }
}
