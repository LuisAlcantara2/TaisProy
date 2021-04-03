@extends('layouts.plantilla')
@section('contenido')

<h1>Editar Registro</h1>   
<form method="POST" action="{{ route('empresa.update',$empresa->idEmpresa)}}">
@method('put')
        @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empresa->nombre}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">RUC</label>
            <input type="number" class="form-control" id="ruc" name="ruc" value="{{ $empresa->ruc}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Tipo Contribuyente</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $empresa->tipo}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Giro del Negocio</label>
            <input type="text" class="form-control" id="giro" name="giro" value="{{ $empresa->giro}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Domicilio Fiscal</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{ $empresa->domicilio}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value="{{ $empresa->telefono}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Email</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{ $empresa->correo}}">
        </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection