@php
	$reporte = $cuento->reportes->last();
@endphp

@extends('layouts.layout')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10-offset-2 col-sm-12 col-xs-12 preview-container">
				<div class="row">
					<div class="col-md-10-offset-2 col-sm-12 col-xs-12">
						<h2 class="display-5">Tu cuento {{ $cuento->titulo }} fue reportado</h2>
					</div>
				</div><br>
				<div class="row justify-content-center">
					<div class="col-md-10-offset-2 col-sm-12 col-xs-12">
						<h4 class="display-6 text-left text-danger">Motivo del reporte:</h4>
						<div class="alert alert-danger">
							<i>"{{ $reporte->motivo }}"</i>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<a href=" {{ route('cuentos.edit', $cuento->id) }} " title="" class="btn btn-sm btn-block form-button">Corregir información del cuento</a>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<a href=" {{ route('paginas.preview', $cuento->id) }} " class="btn btn-sm btn-block form-button">Corregir contenido del cuento</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection