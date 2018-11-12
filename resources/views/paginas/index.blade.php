@extends('layouts.layout')

@section('content')
<div class="pages-container container">
	<header class="header">
		<h1 class="display-4">{{ $cuento->titulo }}</h1>
	</header>
	<div class="page-body">
		@foreach($paginas as $pagina)
		<div class="row pages-footer">
			<div class="col-md-1 col-xs float-left align-self-center">
				<a href="{{ action('PaginaController@create',$cuento->id) }}" data-toggle="tooltip" title="Nueva Página" class="btn card-link">
					<i class="fas fa-plus-circle"></i>
				</a>
			</div>
			<div class="col-md-1 col-xs float-left align-self-center">
				<a href="{{route('paginas.edit', $pagina->id)}}" class="btn card-link" data-toggle="tooltip" title="Editar esta página">
					<i class="fas fa-edit"></i>
				</a>
			</div>
			<div class="col-md col-xs float-right">
				<form class="hidden" action="{{route('paginas.delete', $pagina->id)}}" method="post">
					@csrf	<input type="hidden" name="_method" value="DELETE">
					<button type="submit" class="btn card-link-delete" data-toggle="tooltip" title="Eliminar esta página" name="button">
						<i class="fas fa-trash-alt"></i>
					</button>
				</form>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				{!! $pagina->contenido !!}
			</div>
		</div>
		@endforeach
	</div>
	
	@if($paginaActual == $ultimaPagina)
		<quizz></quizz>
		<strong> {{ $prueba }} </strong>
		@foreach($preguntas as $pregunta)
			<strong>{{ $pregunta->pregunta }}</strong>
		@endforeach
	@else
		<div class="alert alert-warning">
			<strong>¡Continua leyendo!</strong>
		</div>
	@endif		


	

	<div class="row justify-content-end">
		<div class="col-md-12 col-sm-12 col-xs-12 paginate-links">
			<div class="float-right">
				{{ $paginas->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
