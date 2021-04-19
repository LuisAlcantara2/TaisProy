@extends('layouts.plantilla')
@section('contenido')
<h3>LISTADO DE PROCESOS</h3>
<a href="{{route('empresa.index')}}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Volver</a>
<a href="{{route('empresa.createP',$id)}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
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
                <th scope="col">Tipo</th>
                <th scope="col">Ver</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proceso as $itemproceso)
                <tr>
                <td>{{$itemproceso->descripcion}}</td>
                <td>PROCESO @if($itemproceso->tipo==0) ESTRATEGICO
                @elseif($itemproceso->tipo==1) PRIMARIO
                @else DE APOYO
                @endif
                </td>
                <td>
                    <a href="{{route('proceso.indicador',$itemproceso->idProceso)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Indicadores</a>
                    <a href="{{route('proceso.estrategia',$itemproceso->idProceso)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Mapa Estrategico</a>
                </td>
                <td>
                    <a href="{{route('proceso.edit',$itemproceso->idProceso)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('proceso.confirmar',$itemproceso->idProceso)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$proceso->links()}}            
@endsection