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
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $proceso->tipo}}">
        </div>
    </div>
    
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar3')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection