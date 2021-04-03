@extends('layouts.plantilla')
@section('contenido')

<h1>Registrar Empresa</h1>
<form method="POST" action="{{route('empresa.store')}}">
    @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Razon Social</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">RUC</label>
            <input type="number" class="form-control" id="ruc" name="ruc" placeholder="Ingrese RUC">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Tipo Contribuyente</label>
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese Tipo Contribuyente">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Giro del Negocio</label>
            <input type="text" class="form-control" id="giro" name="giro" placeholder="Ingrese Giro del Negocio">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Domicilio Fiscal</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ingrese Domicilio Fiscal">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Telefono">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Email</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese Correo">
        </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>     
@endsection