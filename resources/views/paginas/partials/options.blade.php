<br>
<div class="row pages-footer">

	<div class="col-md-2 col-xs-12 align-self-center">
		<a href="{{ action('PaginaController@create',$cuento->id) }}" data-toggle="tooltip" title="Nueva Página" class="btn card-link float-left">
			<i class="fas fa-plus-circle"></i>
		</a>
	</div>

	<div class="col-md-8 col-xs-12 align-self-center">
		<a href="{{route('paginas.edit', $pagina->id)}}" class="btn card-link float-left" data-toggle="tooltip" title="Editar esta página">
			<i class="fas fa-edit"></i>
		</a>
	</div>
	
	<div class="col-md-2 col-xs-12">
		<form class="hidden" action="{{route('paginas.delete', $pagina->id)}}" method="post">
			@csrf	<input type="hidden" name="_method" value="DELETE">
			<button type="submit" class="float-right btn card-link-delete" data-toggle="tooltip" title="Eliminar esta página" name="button">
				<i class="fas fa-trash-alt"></i>
			</button>
		</form>
	</div>

</div>
<br>