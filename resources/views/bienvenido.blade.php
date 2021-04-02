@extends('layout.plantilla')

@section('contenido')
<h4>Bienvenido : {{ auth()->user()->name }} </h4>
@endsection 