<?php

namespace App\Http\Controllers;

use App\Cuento;
use App\Pagina;
use Illuminate\Http\Request;
use App\Http\Requests\CuentoRequest;
use Image;

class CuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentos = Cuento::paginate(6);
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
      //     Código para guardar la imagen
      // -------------------------------------

      $ruta = public_path().'/img/';
      $imagenOriginal = $request->file('cover');
      $imagen = Image::make($imagenOriginal);
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
      $imagen->resize(300,300);
      $imagen->save($ruta . $temp_name, 100);

      $cuento = new Cuento;

      $cuento->titulo       = $request->get('titulo');
      $cuento->cover        = $temp_name;
      $cuento->idprofesor   = $request->get('idprofesor');
      $cuento->nivel        = $request->get('nivel');
      $cuento->estado       = $request->get('estado');
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
      $ruta = public_path().'/img/';
      $imagenOriginal = $request->file('cover');
      $imagen = Image::make($imagenOriginal);
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
      $imagen->resize(300,300);
      $imagen->save($ruta . $temp_name, 100);

      $cuento->titulo       = $request->get('titulo');
      $cuento->cover        = $temp_name;
      $cuento->idprofesor   = $request->get('idprofesor');
      $cuento->nivel        = $request->get('nivel');
      $cuento->estado       = $request->get('estado');
      $cuento->autor        = $request->get('autor');
      $cuento->descripcion  = $request->get('descripcion');

      $cuento->update();

      return redirect()->route('cuentos.index');
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

      $cuento->delete();
      return redirect()->route('cuentos.index');
    }
}
