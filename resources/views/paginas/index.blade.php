@extends('layouts.layout')

@section('content')
<div class="pages-container container">

	<div class="page-body">
		@foreach($paginas as $pagina)

		@guest

		<div class="alert alert-info row justify-content-center">
			<div class="col-xs-12">
				Recuerde tener siempre una buena lectura comprensiva :)
			</div>
		</div>

		@else

		@if( $cuento->user_id == Auth::id() )

		@include('paginas.partials.options')

		@endif

		@endguest

		<header class="header">
			<h1 class="display-4">{{ $cuento->titulo }}</h1>
		</header>

		<div class="card">
			<div class="card-body">
				{!! $pagina->contenido !!}
			</div>
		</div>

		@endforeach
	</div>

	@if($paginaActual == $ultimaPagina)
	<div class="alert alert-success row justify-content-center">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<strong>Lectura completa</strong>
		</div>
		@guest
		<a href=" {{ route('register') }} " class= "btn btn-success">
			Realizar Quizz
		</a>
		@else
		@if($cantPruebas >= 1)
		<div class="col-md-12 col-sm-12 col-xs-12" data-toggle="tooltip" title="Suma puntos de lector realizando este pequeño quizz">
			<button type="button"class="btn btn-success" data-toggle="modal" data-target="#quizz">
				Quizz
			</button>
		</div>
		@include('pruebas.evaluar')
		@endif
		@endguest

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
