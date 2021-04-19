@extends('layouts.plantilla')
@section('contenido')

<h1>Editar Registro</h1>   
<form method="POST" action="{{ route('indicador.update',$indicador->idIndicador)}}">
@method('put')
        @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">¿Qué se desea medir?</label>
            <input type="text" class="form-control" id="preg1" name="preg1" value="{{ $indicador->preg1}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">¿Quién realizará la medición?</label>
            <input type="text" class="form-control" id="preg2" name="preg2" value="{{ $indicador->preg2}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">¿Qué mecanismos de medición se utilizará?  </label>
            <input type="text" class="form-control" id="preg3" name="preg3" value="{{ $indicador->preg3}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">¿Qué tolerancias de desviación podrán determinarse?</label>
            <input type="text" class="form-control" id="preg4" name="preg4" value="{{ $indicador->preg4}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">¿Qué se hará con los resultados?</label>
            <input type="text" class="form-control" id="preg5" name="preg5" value="{{ $indicador->preg5}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Formula</label>
            <input type="text" class="form-control" id="formula" name="formula" value="{{ $indicador->formula}}">
        </div>
    </div>    
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('proceso.indicador',$indicador->idProceso)}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form> 
@endsection