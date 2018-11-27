<?php

namespace App\Http\Controllers;

use App\User;
use App\Prueba;
use App\Cuento;
use App\Pregunta;
use App\Resultado;
use App\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PruebaController extends Controller
{



    public function crearPrueba(Request $request, $id)
    {

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
            'message'       => 'Todos los usuarios que lean tu cuento podrán realizar tus quizzes',
            'alert-type'    => 'info'
        );
      }

      return redirect()->route('pruebas.create', $prueba->id)->with($notification);
  }

  public function nuevaPrueba($id)
  {
      $prueba = Prueba::find($id);

      return view('pruebas.create')->with(compact('prueba'));
  }


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
        'correcta'  => true
    ],
          //incorrectas
    [
        'respuesta' => $incorrecta1,
        'correcta'  => false
    ],
    [
        'respuesta' => $incorrecta2,
        'correcta'  => false
    ],
    [
        'respuesta' => $incorrecta3,
        'correcta'  => false
    ],
]);

    return back()->with('status', 'Pregunta creada éxitosamente');

}

public function misPruebas($id)
{
    $pruebas = Prueba::where('cuento_id',$id)->get();

    return view('pruebas.quizzes')->with(compact('pruebas'));
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


public function evaluar(Request $request, $id)
{


    $rest = array();
    
    $rest = $request->toArray();


    $puntos     = 0;
    $aciertos   = 0;

    foreach ($rest['respuesta'] as $key => $value) {
        $respuesta = Respuesta::find($value);
        if ($respuesta->correcta) {
            $puntos     = $puntos+10;
            $aciertos   = $aciertos+1;
        }
    }

/*    $resultado = new Resultado;
    $resultado->user_id     = Auth::id();
    $resultado->prueba_id   = $id;
    $resultado->resultado   = $puntos;
    $resultado->save();

    $user = Auth::user();
    $user->puntos = $puntos;
    $user->save();
*/

    if ($puntos >= 30) {
        return "aprobaste";
/*        return redirect()
        ->route('home')
        ->with('aprobado', 'Sumaste '.$puntos.' puntos de lector y acertaste '.$aciertos.' preguntas.' );*/
    }
    elseif ($puntos == 0) {
        return "sacaste 0 puntos";
/*        return redirect()
        ->route('home')
        ->with('reprobado', 'Tuviste 0 aciertos :(' );*/
    }
    else {
        return "desaprobaste:(";
/*        return redirect()
        ->route('home')
        ->with('reprobado', 'Solo acertaste '.$aciertos.' preguntas pero sumaste '.$puntos.' puntos de lector.' );*/
    }

}


public function misResultados()
{
    $userID     = Auth::id();
    $resultados = Resultado::where('user_id', $userID)->get();

    return view('resultados')->with(compact('resultados'));
}

public function pruebaRandom($id)
{
    $prueba = Prueba::where('cuento_id', $id)->get()->random(1);
    $idPrueba = $prueba->implode('id');
    $preguntas = Pregunta::with('respuestas')->where('prueba_id', $idPrueba)->get()->random(5)->shuffle();
    return $preguntas;
}



}