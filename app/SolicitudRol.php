<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudRol extends Model
{
    protected $fillable = ['user_id','motivo'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
