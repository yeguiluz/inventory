@extends('layouts.app')
@section('content')
  <div class="jumbotron">
    <h1 class="display-3">Acceso denegado</h1>
    <p class="lead">No tienes acceso a este modulo, consulta con el Administrador</p>
    <hr class="my-4">
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="{{route('home')}}" role="button">Inicio</a>
    </p>
  </div>
@stop
