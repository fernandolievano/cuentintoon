@extends('layouts.layout')

@section('content')
	<div class="pages-container">
		<header class="header">
			<h1 class="display-4">{{ $cuento->titulo }}</h1>
		</header>
		<div class="page-body">
			@foreach($paginas as $pagina)
			<div class="row pages-footer">
				<div class="col-md-1 col-xs float-left align-self-center">
					<a href="{{ action('PaginaController@create',$cuento->id) }}">
						<img src="{{asset('rsc/newpage16.png')}}" alt="addpage" class="btn btn-link card-link img-responsive" data-toggle="tooltip" title="Nueva Página">
					</a>
				</div>
				<div class="col-md-1 col-xs float-left align-self-center">
					<a href="{{route('paginas.edit', $pagina->id)}}">
						<img src="{{asset('rsc/edit16.png')}}" alt="edit" class="btn btn-link card-link img-responsive" data-toggle="tooltip" title="Editar esta página">
					</a>
				</div>
				<div class="col-md col-xs float-right">
					<form class="hidden" action="{{route('paginas.delete', $pagina->id)}}" method="post">
						@csrf	<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-link card-link-delete" data-toggle="tooltip" title="Eliminar esta página" name="button">
							<img src="{{asset('rsc/delete16.png')}}" class="img-responsive" alt="delete">
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
		<div class="row justify-content-center">
			<div class="col-md-2 col-xs paginate-links">{{ $paginas->links() }}</div>
		</div>
	</div>
@endsection
