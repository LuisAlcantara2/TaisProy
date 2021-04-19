@extends('layouts.plantilla')
@section('contenido')

<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de Estrategias</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Eliminar estrategia::.</u></h5>
            <p class="card-text">
                <p class="card-text">
                    <strong>Estrategia: </strong> {{$estrategia->descripcion}} <br>
                </p>
                <h5 class="card-title">¿Desea eliminar?</h5><br>
                <form action="{{route('estrategia.destroy', $estrategia->idEstrategia)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-check-square"></i>
                            Si
                        </button>
                        <a href="{{route('proceso.estrategia',$estrategia->idProceso)}}" class="btn btn-sm btn-primary">
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