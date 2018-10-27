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
        $paginas = Pagina::where('idcuento',$cuento->id)->paginate(1);
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

      $cuento = Cuento::find($id);
      //Aqui va summernote store
      $this->validate($request, [
           'contenido' => 'required',
       ]);

       $contenido   = $request->input('contenido');

       $pagina = new Pagina;
       $pagina->idcuento    = $id;
       $pagina->contenido   = $contenido;
       $pagina->save();

       return redirect()->route('cuentos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $pagina->delete();

        return redirect()->route('cuentos.index');
    }
}
