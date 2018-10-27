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
      $user->nivel      = 1;
      $user->password   = Hash::make($request->get('password'));
      $user->save();
      $user->assignRole($idrole);

      return redirect()->route('home');

    }

    public function actualizar($id)
    {
      return "Actualizar Usuario";
    }
}
