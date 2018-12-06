<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\User;

class UserController extends Controller
{
    public function registro(Request $request)
    {

      $validacion = $request->validate([
        'name'        => 'required|string',
        'lastname'    => 'required|string',
        'avatar'      => 'nullable',
        'username'    => 'required|string|unique:users',
        'email'       => 'required|string|email|unique:users',
        'password'    => 'required|string|min:6|confirmed'
      ]);

      $idrole = Role::where('slug','lector')->pluck('id')->first();

      $user = new User;
      $user->name       = $request->get('name');
      $user->lastname   = $request->get('lastname');
      $user->username   = $request->get('username');
      $user->email      = $request->get('email');
      $user->puntos     = 0;
      $user->nivel      = 'Aficionado';
      $user->password   = Hash::make($request->get('password'));
      $user->save();
      $user->assignRole($idrole);

      return redirect()->route('home');

    }

      /*//////////////////////////////////////////
     // Métodos destinados a AjustesUsuario.vue//
    //////////////////////////////////////////*/

    public function informacion()
    {
      $user = Auth::user();

      return $user;
    }


    public function cambiarNombre(Request $request)
    {
      $this->validate($request, [
        'name'      => 'min:2|max:25|required',
        'lastname'  => 'min:2|max:25|required',
      ]);

      Auth::user()->update($request->all());

      return;
    }


    public function cambiarUsername(Request $request)
    {
      $this->validate($request, [
        'username' => 'min:2|max:25|required'
      ]);

      Auth::user()->update($request->all());

      return;
    }


    public function cambiarEmail()
    {
      //
    }

    public function cambiarPass()
    {
      return "cambio contraseña";
    }

    public function cambiarAvatar()
    {
      return "cambio avatar";
    }

    public function topUsuarios(){
      $usuarios = User::orderBy('puntos', 'DESC')->get();
      return $usuarios;
    }
}
