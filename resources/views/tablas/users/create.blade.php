@extends('layouts.plantilla')
@section('contenido')

<h1>Registrar Usuario</h1>
<form method="POST" action="{{route('user.store')}}">
    @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombres">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese Apellidos">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">DNI</label>
            <input type="number" class="form-control" id="dni" name="dni" placeholder="Ingrese DNI">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese Correo">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese Contraseña">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Rol</label>
            <select class="form-control" name="is_admin" id="is_admin">
                <option value="0">Usuario</option>
                <option value="1">Administrador</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Direccion</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ingrese Domicilio Fiscal">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Telefono">
        </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar1')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>     
@endsection