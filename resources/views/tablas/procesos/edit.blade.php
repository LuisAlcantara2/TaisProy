@extends('layouts.plantilla')
@section('contenido')

<h1>Editar Registro</h1>   
<form method="POST" action="{{ route('proceso.update',$proceso->idProceso)}}">
@method('put')
        @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $proceso->descripcion}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Tipo</label>
            <select class="form-control" name="tipo" id="tipo">
                <option {{$proceso->tipo == 0  ? 'selected' : ''}} value="0">PROCESO ESTRATEGICO</option>
                <option {{$proceso->tipo == 1  ? 'selected' : ''}} value="1">PROCESO PRIMARIO</option>
                <option {{$proceso->tipo == 2  ? 'selected' : ''}} value="2">PROCESO DE APOYO</option>
            </select>
        </div>
    </div>
    
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('empresa.procesos',$proceso->idEmpresa)}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection