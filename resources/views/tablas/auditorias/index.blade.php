@extends('layouts.plantilla')
@section('contenido')

<h3>AUDITORIA</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Movimiento</th>
        <th scope="col">Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($auditoria as $itemauditoria)
        <tr>
        <td>{{$itemauditoria->usuario}}</td>
        <td>{{$itemauditoria->email}}</td>
        <td>{{$itemauditoria->movimiento}}</td>
        <td>{{$itemauditoria->fecha}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$auditoria->links()}}            
@endsection