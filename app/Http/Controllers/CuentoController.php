<?php

namespace App\Http\Controllers;

use Image;
use App\Cuento;
use App\Pagina;
use Illuminate\Http\Request;
use App\Http\Requests\CuentoRequest;
use Illuminate\Support\Facades\Auth;


class CuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentos = Cuento::where('estado', 'Publicado')->paginate(6);
        return view('cuentos.index',compact('cuentos'))->withCuentos($cuentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuentos.create');
    }

    //-------------------------------------------------------
    //Generar un random_string
    protected function random_string()
    {
    $key = '';
    $keys = array_merge( range('a','z'), range(0,9) );

    for($i=0; $i<10; $i++)
    {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
  }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentoRequest $request)
    {

      // -------------------------------------
      //           Guardar imagen
      // -------------------------------------

      $ruta = public_path().'/img/';
      $imagenOriginal = $request->file('cover');
      $imagen = Image::make($imagenOriginal);
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
      $imagen->resize(300,300);
      $imagen->save($ruta . $temp_name, 100);

      $id_usuario = Auth::id();

      $cuento = new Cuento;

      $cuento->titulo       = $request->get('titulo');
      $cuento->cover        = $temp_name;
      $cuento->user_id      = $id_usuario;
      $cuento->nivel        = $request->get('nivel');
      $cuento->estado       = 'En Revisión';
      $cuento->autor        = $request->get('autor');
      $cuento->descripcion  = $request->get('descripcion');

      $cuento->save();

      return redirect()->action('CuentoController@preview',$cuento->id);
    }

    /*
      ------------------------------------------------------
          Vista previa antes de pasar a crear páginas
      ------------------------------------------------------
    */
    public function preview($id)
    {
      $cuento = Cuento::find($id);
      return view('cuentos.preview',compact('cuento','id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuento = Cuento::find($id);
        return view('cuentos.show',compact('cuento','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuento = Cuento::find($id);
        return view('cuentos.edit',compact('cuento','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $cuento = Cuento::find($id);

      if ($request->hasFile('cover')) {
        $ruta = public_path().'/img/';
        $imagenOriginal = $request->file('cover');
        $imagen = Image::make($imagenOriginal);
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
        $imagen->resize(300,300);
        $imagen->save($ruta . $temp_name, 100);

        $cuento->cover        = $temp_name;
      }

      

      $cuento->titulo       = $request->get('titulo');
      $cuento->nivel        = $request->get('nivel');
      $cuento->estado       = 'Publicado';
      $cuento->autor        = $request->get('autor');
      $cuento->descripcion  = $request->get('descripcion');

      $cuento->update();

      return redirect()->route('cuentos.index');
    }


    public function revision($id)
    {
      $cuento = Cuento::find($id);
      $cuento->estado = 'Publicado';

      if ( $cuento->update() ) {
        echo "success";
        $notification = array(
          'message'     => 'El cuento ha sido publicado',
          'alert-type'  => 'success'
        );
      }

      return back()->with($notification);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuento  $cuento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cuento = Cuento::find($id);

      if (file_exists(public_path('img/'.$cuento->cover))) {
        unlink(public_path('img/'.$cuento->cover));
      }


      if ( $cuento->delete() ) {
        echo 'error';
        $notification = array(
          'message'     => 'Un cuento ha sido eliminado',
          'alert-type'  => 'error'
        );
      }
      return back()->with($notification);
    }

    public function testingComponent ()
    {
       
       return Cuento::orderBy('id','DESC')->get();
    }
}
