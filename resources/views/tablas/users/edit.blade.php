@extends('layouts.plantilla')
@section('contenido')

<h1>Editar Registro</h1>   
<form method="POST" action="{{ route('user.update',$user->id)}}">
@method('put')
        @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$user->nombre}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{$user->apellido}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">DNI</label>
            <input type="number" class="form-control" id="dni" name="dni" value="{{$user->dni}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{$user->email}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Direccion</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{$user->direccion}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value="{{$user->telefono}}">
        </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar1')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection