@extends('layouts.plantilla')
@section('contenido')

<h1>Registrar</h1>
<form method="POST" action="{{route('comando.update',$comando->idComando)}}">
    @method('put')
    @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Objetivo</label>
            <input type="text" class="form-control" id="obj" name="obj" value="{{$comando->objetivo}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Iniciativa</label>
            <input type="text" class="form-control" id="ini" name="ini" value="{{$comando->iniciativas}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Indicador </label>
            <input readonly type="text" class="form-control" id="3" name="3" value="{{$indicador->preg1}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Meta</label>
            <input type="text" class="form-control" id="meta" name="meta" value="{{$comando->meta}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Responsable</label>
            <input type="text" class="form-control" id="resp" name="resp" value="{{$comando->responsable}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Frecuencia</label>
            <input type="text" class="form-control" id="fre" name="fre" value="{{$comando->frecuencia}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Linea Base</label>
            <input type="text" class="form-control" id="base" name="base" value="{{$comando->lineaBase}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Condicion Aceptable</label>
            <input type="text" class="form-control" id="cap" name="cap" value="{{$comando->condicionVerde}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Condicion Mala</label>
            <input type="text" class="form-control" id="cma" name="cma" value="{{$comando->condicionRoja}}">
        </div>
    </div>
    <input type="hidden" class="form-control" id="cam" name="cam" value="cap">
    <input  type="hidden" class="form-control" id="idIndicador" name="idIndicador" value={{$indicador->idIndicador}}>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('proceso.indicador',$indicador->idProceso)}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>     
@endsection