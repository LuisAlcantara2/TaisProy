@extends('layouts.plantilla')
@section('contenido')

<h3>LISTADO DE EMPRESAS</h3>
<a href="{{route('empresa.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
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
                <th scope="col">Nombre</th>
                <th scope="col">RUC</th>
                <th scope="col">Ver </th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresa as $itemempresa)
                <tr>
                <td>{{$itemempresa->nombre}}</td>
                <td>{{$itemempresa->ruc}}</td>
                <td>
                    <a href="{{route('empresa.procesos',$itemempresa->idEmpresa)}}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>Procesos</a>
                </td>
                <td>
                    <a href="{{route('empresa.edit',$itemempresa->idEmpresa)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('empresa.confirmar',$itemempresa->idEmpresa)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
    {{$empresa->links()}}            
@endsection