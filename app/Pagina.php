<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    public function cuento()
    {
      return $this->belongsTo('Cuento');
    }
    
}
