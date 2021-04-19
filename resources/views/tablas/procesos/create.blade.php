@extends('layouts.plantilla')
@section('contenido')

<h1>Registrar Proceso</h1>
<form method="POST" action="{{route('proceso.store')}}">
    @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese Nombre">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Tipo</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="0">PROCESO ESTRATEGICO</option>
                <option value="1">PROCESO PRIMARIO</option>
                <option value="2">PROCESO DE APOYO</option>
            </select>
        </div>
    </div>
    <input hidden="true" type="text" class="form-control" id="idEmpresa" name="idEmpresa" value={{$id}}>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('empresa.procesos',$id)}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>     
@endsection