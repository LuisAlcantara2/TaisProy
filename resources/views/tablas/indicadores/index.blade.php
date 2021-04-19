@extends('layouts.plantilla')
@section('contenido')

<h3>LISTADO DE INDICADORES</h3>
<a href="{{route('proceso.createI',$id)}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
<nav class="navbar float-right">
</nav>
@if(session('datos'))
<div class="alert alert-warning alert-dismissile fade show mt-3" role="alert">
    {{session ('datos') }}
    <button class="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Responsable</th>
                <th scope="col">Tabla de comandos</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($indicador as $itemIndicador)
                <tr>
                <td>{{$itemIndicador->preg1}}</td>
                <td>{{$itemIndicador->preg2}}</td>
                <td>
                    <a href="{{route('indicador.comando',$itemIndicador->idIndicador)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Registrar</a>
                    <a href="{{route('indicador.tablero',$itemIndicador->idIndicador)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ver tablero</a>
                </td>
                <td>
                    <a href="{{route('indicador.edit',$itemIndicador->idIndicador)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('indicador.confirmar',$itemIndicador->idIndicador)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$indicador->links()}}            
@endsection