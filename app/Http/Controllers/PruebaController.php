<?php

namespace App\Http\Controllers;

use App\Prueba;
use App\Cuento;
use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPrueba(Request $request, $id)
    {



        //Crea y Guarda prueba
        $nombre         = $request->input('prueba');
        $nombre_prueba  = $this->random_string().$nombre;
        $id_usuario     = Auth::id();

        $prueba = new Prueba;
        $prueba->prueba     = $nombre_prueba;
        $prueba->user_id    = $id_usuario;
        $prueba->cuento_id  = $id;

        if ( $prueba->save() ) {
          echo "info";
          $notification = array(
            'message' => 'Todos los usuarios que lean tu cuento podrán realizar tus quizzes',
            'alert-type' => 'info'
          );
        }

        return redirect()->route('pruebas.create', $prueba->id)->with($notification);
    }

    public function nuevaPrueba($id)
    {
      $prueba = Prueba::find($id);
      return view('pruebas.create')->with(compact('prueba'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePreguntaRespuestas(Request $request, $id)
    {
        $correcta     = $request->get('correcta');
        $incorrecta1  = $request->get('incorrecta1');
        $incorrecta2  = $request->get('incorrecta2');
        $incorrecta3  = $request->get('incorrecta3');

        $pregunta = new Pregunta;
        $pregunta->pregunta = $request->get('pregunta');
        $pregunta->prueba_id = $id;
        $pregunta->save();

        $pregunta->respuestas()->createMany([
          //correcta
          [
            'respuesta' => $correcta,
            'correcta' => true
          ],
          //incorrectas
          [
            'respuesta' => $incorrecta1,
            'correcta' => false
          ],
          [
            'respuesta' => $incorrecta2,
            'correcta' => false
          ],
          [
            'respuesta' => $incorrecta3,
            'correcta' => false
          ],
        ]);

        return back()->with('status', 'Pregunta creada éxitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function show(Prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prueba $prueba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prueba $prueba)
    {
        //
    }

    //-------------------------------------------------------
    //               Generar un random_string
    //-------------------------------------------------------
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
}
