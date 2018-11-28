<?php

namespace App\Http\Controllers;

use Image;
use App\Cuento;
use App\Pagina;
use App\Reporte;
use Illuminate\Http\Request;
use App\Http\Requests\CuentoRequest;
use Illuminate\Support\Facades\Auth;


class CuentoController extends Controller
{

    public function index()
    {
        return view('cuentos.index');
    }

    public function leer($id)
    {
      $cuento = Cuento::find($id);

      return view('cuentos.leer')->with(compact('cuento'));      
    }

    public function leerCuento($id)
    {
      $paginas = Pagina::where('cuento_id', $id)->get();
      return $paginas;
    }

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


    public function store(CuentoRequest $request)
    {


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


    public function preview($id)
    {
      $cuento = Cuento::find($id);
      return view('cuentos.preview',compact('cuento','id'));
    }


    public function show($id)
    {
        $cuento = Cuento::find($id);
        return view('cuentos.show',compact('cuento','id'));
    }


    public function edit($id)
    {
        $cuento = Cuento::find($id);
        return view('cuentos.edit',compact('cuento','id'));
    }


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
      $cuento->estado       = 'En Revisión';
      $cuento->autor        = $request->get('autor');
      $cuento->descripcion  = $request->get('descripcion');

      $cuento->update();

      return redirect()->route('cuentos.index');
    }

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

    public function publicar($id)
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

      return redirect()->route('home')->with($notification);
    }

    public function inspeccionar($id)
    {

      $cuento = Cuento::find($id);

      return view('usuarios.moderador.inspeccionar')->with(compact('cuento'));

    }

    public function reportar(Request $request, $id)
    {

      $cuento = Cuento::find($id);
      $cuento->estado = 'Reportado';
      $cuento->update();

      $motivo = $request->get('motivo');

      $reportar = Reporte::create([

                  'cuento_id' => $id,
                  'motivo'    => $motivo

                  ]);

      if ( $reportar ) {

        echo  "warning";
        $notification = array(
          'message'     => 'El cuento '.$cuento->titulo.' ha sido reportado',
          'alert-type'  => 'warning'
        );

      }

      return redirect()->route('home')->with($notification);

    }

    public function reportes($id)
    {
      $cuento = Cuento::find($id);

      return view('usuarios.escritor.reportes')->with(compact('cuento'));
    }

    public function cuentos()
    {
      $cuentos = Cuento::where('estado', 'Publicado')->with('user')->get();
      return $cuentos;
    }


}
