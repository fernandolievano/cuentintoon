<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaginaRequest;
use Illuminate\Http\Request;
use App\Cuento;
use App\Pagina;
use App\Prueba;
use App\Pregunta;
use App\Respuesta;
use App\Resultado;

class PaginaController extends Controller
{

     public function leer($id)
    {
        $user = Auth::user();
        $cuento = Cuento::find($id);

        $paginas = Pagina::where('cuento_id', $id)
        ->paginate(1);

        $pruebas = Prueba::where('cuento_id', $id);
        $cantPruebas   = $pruebas->count();

        if ($cantPruebas >= 1) {

            $prueba = Prueba::where('cuento_id', $id)
            ->get()
            ->random();

            if ( $user ) {
            
                $resultados = Resultado::where([
                    ['user_id', $user->id],
                    ['prueba_id', $prueba->id],
                ])
                ->whereIn('resultado',[30,40,50])
                ->get();

            }

            $paginaActual = $paginas->currentPage();
            $ultimaPagina = $paginas->lastPage();

            return view('paginas.index')
            ->with(compact('cuento','paginas','paginaActual',
                'ultimaPagina', 'cantPruebas', 'prueba',
                'user', 'resultados'))
            ->withPaginas($paginas);   

        }

        else {

            $paginaActual = $paginas->currentPage();
            $ultimaPagina = $paginas->lastPage();

            return view('paginas.index')
            ->with(compact('cuento','paginas','paginaActual',
                'ultimaPagina', 'cantPruebas', 'user'))
            ->withPaginas($paginas);

        }
    }


    public function create($id)
    {
      $cuento = Cuento::find($id);
      return view('paginas.create',compact('id','cuento'));
    }


    public function store(PaginaRequest $request,$id)
    {

      $this->validate($request, [
           'contenido' => 'required',
       ]);

       $contenido   = $request->input('contenido');

       $pagina = new Pagina;
       $pagina->cuento_id = $id;
       $pagina->contenido = $contenido;

       if ($pagina->save()) {
         echo "success";
         $notification = array(
           'message'    => 'Nueva página creada',
           'alert-type' => 'success'
         );
       }
       return redirect()->route('paginas.preview', $id);

    }

    public function preview($id)
    {
        $cuento = Cuento::find($id);

        return view('paginas.preview')->with(compact('cuento'));
    }

    public function ready($id)
    {
        $cuento = Cuento::find($id);
        $cuento->estado = 'En Revisión';
        $cuento->update();

      return redirect()
      ->route('home')
      ->with('status','Tu cuento ha sido creado/actualizado exitosamente, ahora pasará a estado de revisión para luego ser publicado.');
    }


    public function edit($id)
    {
        $pagina = Pagina::find($id);
        return view('paginas.edit',compact('pagina'));
    }

    public function update(PaginaRequest $request, $id)
    {
        //Aqui va summernote update
        $this->validate($request, [
            'contenido' => 'required',
        ]);
        $contenido = $request->get('contenido');

        $pagina = Pagina::find($id);
        $pagina->contenido = $contenido;
        $pagina->update();

        $idCuento = $pagina->cuento_id;
        $cuento = Cuento::find($idCuento);
        $cuento->estado = 'En Revisión';
        $cuento->update();

        return redirect()->route('paginas.preview', $idCuento);
    }


    public function destroy($id)
    {
        $pagina = Pagina::find($id);

        if ( $pagina->delete() ) {
          echo "error";
          $notification = array(
            'message'     => 'Una página ha sido eliminada',
            'alert-type'  => 'error'
          );
        }

        return back()->with($notification);
    }
}
