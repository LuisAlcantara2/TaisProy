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
            <input type="text" class="form-control" id="obj" name="obj" placeholder="Ingrese respuesta">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Iniciativa</label>
            <input type="text" class="form-control" id="ini" name="ini" placeholder="Ingrese respuesta">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Indicador </label>
            <input readonly type="text" class="form-control" id="3" name="3" value={{$indicador->preg1}}>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Meta</label>
            <input type="text" class="form-control" id="meta" name="meta" placeholder="Ingrese respuesta">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Responsable</label>
            <input type="text" class="form-control" id="resp" name="resp" placeholder="Ingrese respuesta">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Frecuencia</label>
            <input type="text" class="form-control" id="fre" name="fre" placeholder="Ingrese formula">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Linea Base</label>
            <input type="text" class="form-control" id="base" name="base" placeholder="Ingrese formula">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Condicion Aceptable</label>
            <input type="text" class="form-control" id="cap" name="cap" placeholder="Ingrese formula">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Condicion Mala</label>
            <input type="text" class="form-control" id="cma" name="cma" placeholder="Ingrese formula">
        </div>
    </div>
    <input type="hidden" class="form-control" id="cam" name="cam" value="cap">
    <input  type="hidden" class="form-control" id="idIndicador" name="idIndicador" value={{$indicador->idIndicador}}>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('proceso.indicador',$indicador->idProceso)}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>     
@endsection