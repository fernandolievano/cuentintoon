<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;


class AdministracionController extends Controller
{


  // Dashboard de Administración
  public function dashboard(){

    $usuarios   = User::all();
    $roles      = Role::all();
    $permisos   = Permission::all();
    return view('admin.panel')->with(compact('roles','permisos','usuarios'));

  }


  // Crear Roles
  public function nuevoRol(Request $request){

    if ( Role::create($request->all()) ) {
      echo "success";
      $notification = array(
        'message'     => 'Nuevo rol creado con éxito',
        'alert-type'  => 'success'
      );
    }
    return back()->with($notification);

  }


  // Eliminar un Rol
  public function borrarRol($id){

    $role = Role::find($id);

    if ( $role->delete() ) {
      echo "error";
      $notification = array(
        'message'     => 'Un rol ha sido eliminado',
        'alert-type'  => 'error'
      );
    }
    return back()->with($notification);

  }


  // Crear nuevo Permiso
  public function nuevoPermiso(Request $request){

    if ( Permission::create($request->all()) ) {
      echo "success";
      $notification = array(
        'message'     => 'Nuevo permiso creado con éxito',
        'alert-type'  => 'success'
      );
    }
    return back()->with($notification);

  }


  // Eliminar un permiso
  public function borrarPermiso($id){

    $permiso = Permission::find($id);

    if ( $permiso->delete() ) {
      echo "error";
      $notification = array(
        'message'     => 'Un permiso ha sido eliminado',
        'alert-type'  => 'error'
      );
    }
    return back()->with($notification);

  }


  //Asignar Permisos a Roles
  public function asignarPermiso(Request $request){

    $roleid = $request->input('rol');
    $idper  = $request->input('permiso');
    $rol    = Role::find($roleid);
    $rol->assignPermission($idper);

    if ( $rol->save() ) {
      echo "success";
      $notification = array(
        'message'     => 'Permiso asignado éxitosamente',
        'alert-type'  => 'success'
      );
    }
    return back()->with($notification);

  }


  //Asignar Rol a Usuario
  public function asignarRol(Request $request){

    $idrole = $request->get('rol');

    $iduser = Auth::id();
    $user   = User::find($iduser);
    $user->assignRole($idrole);

    $user = User::find($iduser);
    $rolesasignados = $user->getRoles();

    return  json_encode($rolesasignados);

  }



}
