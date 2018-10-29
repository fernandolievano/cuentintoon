<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;
use App\Http\Requests\PaginaRequest;
use App\Cuento;
use Image;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
    }

     public function leer($id)
    {
        $cuento = Cuento::find($id);
        $paginas = Pagina::where('cuento_id',$cuento->id)->paginate(1);
        return view('paginas.index',compact('cuento','paginas'))->withPaginas($paginas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $cuento = Cuento::find($id);
      return view('paginas.create',compact('id','cuento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $cuento = Cuento::find($id);

        return view('paginas.preview')->with(compact('cuento'));
    }

    public function ready()
    {
      return redirect()
      ->route('home')
      ->with('status','Tu cuento ha sido creado exitosamente, ahora pasará a estado de revisión para luego ser publicado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagina = Pagina::find($id);
        return view('paginas.edit',compact('pagina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('cuentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
