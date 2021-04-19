@extends('layouts.plantilla')
@section('contenido')

<h3>LISTADO DE ESTRATEGIAS</h3>
<a href="{{route('empresa.procesos',$proceso->idEmpresa)}}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Volver</a>
<a href="{{route('proceso.createE',$id)}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
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
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estrategia as $itemestrategia)
                <tr>
                <td>{{$itemestrategia->descripcion}}</td>
                <td>{{$itemestrategia->tipo}}</td>
                <td>
                    <a href="{{route('estrategia.edit',$itemestrategia->idEstrategia)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('estrategia.confirmar',$itemestrategia->idEstrategia)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$estrategia->links()}}            
@endsection