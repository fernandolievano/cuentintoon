@extends('layouts.layout')

@section('content')
<ul>
	@foreach($resultados as $resultado)
	<li> {{ $resultado->resultado }} </li>
	@endforeach
</ul>
@endsection