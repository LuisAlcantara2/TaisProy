@extends('layouts.plantilla')
@section('contenido')

<h1>Editar Registro</h1>   
<form method="POST" action="{{ route('estrategia.update',$estrategia->idEstrategia)}}">
@method('put')
@csrf
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $estrategia->descripcion}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Tipo</label>
            <select class="form-control" name="tipo" id="tipo">
                <option {{$estrategia->tipo == 0 ? 'selected' : ''}} value="0">FINANCIERA</option>
                <option {{$estrategia->tipo == 1 ? 'selected' : ''}} value="1">CLIENTES</option>
                <option {{$estrategia->tipo == 2 ? 'selected' : ''}} value="2">PROCESO DE NEGOCIO</option>
                <option {{$estrategia->tipo == 3 ? 'selected' : ''}} value="3">APRENDIZAJE Y CONOCIMIENTO</option>
            </select>
        </div>
    </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('proceso.estrategia',$estrategia->idProceso)}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection