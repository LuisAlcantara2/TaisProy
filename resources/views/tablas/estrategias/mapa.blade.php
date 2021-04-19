@extends('layouts.plantilla')
@section('estilos')
<style>
    table {
		/* Para centrar usamos "auto" en la alineación horizontal */
    margin: 0 auto;
		/*Lo siguiente es para los bordes*/
    border-collapse: collapse;
    }
    .table img{
        width: 50px;
        margin-left: 10%;
        margin-right: 10%;
    }
    .table .container-img-arriba{
        text-align: center;
    }
    .financiera{
        background-color: green;
        width: 100%;
        height: 50px;
        border: 1px solid;
        text-align: center;
    }
    .cliente{
        background-color: yellow;
        width: 100%;
        height: 50px;
        border: 1px solid;
        text-align: center;
    }
    .negocio{
        background-color: orange;
        width: 100%;
        height: 50px;
        border: 1px solid;
        text-align: center;
    }
    .aprendizaje{
        background-color: blue;
        width: 100%;
        height: 50px;
        border: 1px solid;
        text-align: center;
    }
    .caja{
        border: 1px solid;
        text-align: center;
        padding: 6px;
    }
</style>
@endsection
@section('contenido')
<a href="{{route('proceso.estrategia',$id)}}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Volver</a>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Visualizar</h5>
                <!-- <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-refresh-cw reload-card"></i></li>
                        <li><i class="feather icon-trash close-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div> -->
                <input type="hidden" id="idEditar" value="">
            </div>
            <div class="card-block">
                <div style="text-align:center;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="financiera">
                                        <p style="font-weight: bold;">FINANCIERA</p>
                                    </div>
                                </td>
                                @foreach($estrategia as $itemestrategia)
                                @if($itemestrategia->tipo==0)
                                <td>
                                    <div class="caja">
                                        {{$itemestrategia->descripcion}}
                                    </div>
                                </td>
                                @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    <div class="container-img-arriba">
                                        <img src="/images/balance-flecha-arriba.png" alt="">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="cliente">
                                        <p style="font-weight: bold;">CLIENTE</p>
                                    </div>
                                </td>
                                @foreach($estrategia as $itemestrategia)
                                @if($itemestrategia->tipo==1)
                                <td>
                                    <div class="caja">
                                        {{$itemestrategia->descripcion}}
                                    </div>
                                </td>
                                @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    <div class="container-img-arriba">
                                        <img src="/images/balance-flecha-arriba.png" alt="">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="negocio">
                                        <p style="font-weight: bold;">PROCESO DE NEGOCIO</p>
                                    </div>
                                </td>

                                @foreach($estrategia as $itemestrategia)
                                @if($itemestrategia->tipo==2)
                                <td>
                                    <div class="caja">
                                        {{$itemestrategia->descripcion}}
                                    </div>
                                </td>
                                @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    <div class="container-img-arriba">
                                        <img src="/images/balance-flecha-arriba.png" alt="">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="aprendizaje">
                                        <p style="font-weight: bold;">APRENDIZAJE Y CONOCIMIENTO</p>
                                    </div>
                                </td>

                                @foreach($estrategia as $itemestrategia)
                                @if($itemestrategia->tipo==3)
                                <td>
                                    <div class="caja">
                                        {{$itemestrategia->descripcion}}
                                    </div>
                                </td>
                                @endif
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection