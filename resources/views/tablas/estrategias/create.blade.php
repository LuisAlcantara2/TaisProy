@extends('layouts.plantilla')
@section('contenido')

<h1>Registrar Estrategia</h1>
<form method="POST" action="{{route('estrategia.store')}}">
    @csrf
  <div class="form-group">
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Tipo de Estategia</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="0">FINANCIERA</option>
                <option value="1">CLIENTES</option>
                <option value="2">PROCESO DE NEGOCIO</option>
                <option value="2">APRENDIZAJE Y CONOCIMIENTO</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="descripcion">Relaciones</label>
            <select class="form-control" size="3" multiple aria-label="multiple select example" name="relaciones" id="relaciones">
                @foreach($estrategia as $itemestrategia)
                    <option value="{{$itemestrategia->idEstrategia}}">{{$itemestrategia->descripcion}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input hidden="true" type="text" class="form-control" id="idProceso" name="idProceso" value={{$id}}>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('proceso.estrategia',$id)}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>     
@endsection