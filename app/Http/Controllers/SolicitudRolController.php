<?php

namespace App\Http\Controllers;

use App\SolicitudRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;

class SolicitudRolController extends Controller
{
    public function solicitar(Request $request)
    {
    	$user_id 	= Auth::id();

    	$motivo 	= $request->get('motivo');
    	
	    $guardar 	= SolicitudRol::create([

	    				'user_id' 	=> $user_id,
	    				'motivo'	=> $motivo,

	    			]);

    	if ($guardar) {
    		return redirect()->route('home')->with('status', 'La solicitud ha sido realizada exitosamente');
    	}
    	else{
    		return back()->with('status', 'Ya has realizado una solicitud antes');
    	}
    }

    public function escritor($id)
    {
    	$solicitud = SolicitudRol::find($id);

    	$idrole = Role::where('slug','escritor')->pluck('id')->first();
    	$promover = $solicitud->user->assignRole($idrole);

    	$eliminar = $solicitud->delete();

    	if ( $promover && $eliminar ) {
    		return back()->with('status', 'El usuario ha sido promovido a Escritor');
    	}

    }
}
