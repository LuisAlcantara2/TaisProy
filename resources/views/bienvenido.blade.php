@extends('layout.plantilla')

@section('contenido')
<h4>Bienvenido {{ auth()->user()->nombre }} </h4>
@endsection 