@extends('layouts.layout')

@section('content')
  <div class="pages-container">
    <paginas
    :cuento="{{ $cuento }}"
    :creador="{{$cuento->user}}">
    </paginas>
  </div>
@endsection
