@extends('layouts.plantilla')
@section('contenido')

<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de Indicadores</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Eliminar Indicador::.</u></h5>
            <p class="card-text">
                <p class="card-text">
                    <strong>Indicador: </strong> {{$indicador->preg1}} <br>
                    <strong>Responsable: </strong> {{$indicador->preg2}}
                </p>
                <h5 class="card-title">¿Desea eliminar?</h5><br>
                <form action="{{route('indicador.destroy', $indicador->idIndicador)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-check-square"></i>
                            Si
                        </button>
                        <a href="{{route('proceso.indicador',$indicador->idProceso)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-times-circle"></i>
                            NO
                        </a>
                    </div>
                </form>
            </p>
        </div>
    </div>
</div>
@endsection      