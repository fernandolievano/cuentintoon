<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
	protected $fillable = [ 'motivo', 'cuento_id' ];

    public function cuento()
    {
    	return $this->belongsTo(Cuento::class);
    }
}
