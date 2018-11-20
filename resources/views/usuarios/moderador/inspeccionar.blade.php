@php 
$contador = 0;
@endphp

@extends('layouts.layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10-offset-2 col-sm-12 col-xs-12 preview-container">
			<header class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h4 class="display-4">Ins<span class="dark-letter">p</span>eccionar</h4>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<ul class="list-unstyled text-left text-muted">
						<li>Título del cuento: <b> {{ $cuento->titulo }} </b></li>
						<li>Subido por: <b> {{ $cuento->user->username }} </b> </li>
						<li>Cantidad de páginas: <b> {{ $cuento->paginas->count() }} </b> </li>
						<li>Fecha: <b> {{ $cuento->created_at }} </b> </li>
					</ul>
				</div>
				<div class="col-sm-8-offset-4 col-xs-12 col-sm-12">
					<h4 class="display-6">Portada</h4>
					<img src="{{ asset('img/'.$cuento->cover) }}" class="img-thumbnail border border-secondary" alt="Foto de portada">
				</div> 
			</header><br>
			<div class="row justify-content-center">
				<div class="col-md-8-offset-4 col-sm-8 col-xs-8">
					<h4 class="display-6">Páginas</h4>
				</div>
				@foreach($cuento->paginas as $pagina)
				@php 
				$contador = $contador+1;
				@endphp
				<div class="col-md-8-offset-4 col-sm-8 col-xs-8  pagina-inspeccionar">
					{!! $pagina->contenido !!}
					<span class="dark-letter"> {{ $contador }} </span>
				</div>
				@endforeach
			</div><br>
			<footer class="row">
				<div class="col-md-6 col-sm.6 col-xs-6 align-self-center text-left">
					<button type="button" data-toggle="modal" data-target="#reportar" class="btn btn-block btn-sm btn-danger">Reportar</button>
				</div>
				<div class="col-md-6 col-sm.6 col-xs-6 align-self-center text-right">
					<form action="{{ route('cuentos.publicar', $cuento->id) }}" method="post" id="publicando">
						@csrf @method('PUT')
						<button type="submit" class="btn btn-block btn-sm form-button">Publicar</button>
					</form>
				</div>
			</footer>
		</div>
	</div>
</div>
@include('usuarios.moderador.reportar')
@endsection