@extends('layouts.plantilla')
@section('estilos')
<style>

    .m-6{
        margin-top: 2em;
    }

    .question{
        font-weight: bold;
    }

    .question-item{
        margin-bottom:10px;

    }

    .text-center{
        text-align: center;
    }

    .name-variable{
        padding:0;
    }

    .text-variable{
        margin-bottom:4px;
    }

    .btn-save{
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .resize-none{
        resize: none;
    }

    .div-semaforo{
        width: 34px;
        height: 34px;
    }

    .background-green{
        background-color: green;
    }

    .background-red{
        background-color: red;
    }

    .background-yellow{
        background-color: yellow;
    }

    .table_scoreCard .objetivo{
        border: 1px solid;
        padding: 10px;
        width: 150px;
        border-radius: 30%;
        text-align: center;
    }

    .table_scoreCard img{
        width: 50px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .table_scoreCard .container-img-arriba{
        text-align: center;
    }

    .table_scoreCard .indicador{
        border: 1px solid;
        padding: 10px;
        width: 150px;
        text-align: center;
    }

    .table_scoreCard .iniciativas{
        border: 1px solid;
        padding: 10px 20px;
        width: 350px;
    }

    .table_scoreCard .metas{
        border: 1px solid;
        padding: 10px;
        width: 100px;
        border-radius: 50%;
        text-align: center;
    }

    .table_scoreCard .container-semaforo{
        padding: 25px;
        border: 1px solid;
    }

    .table_scoreCard .semaforo{
        
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .table_scoreCard .responsable{
        border: 1px solid;
        padding: 6px;
        width: 150px;
        text-align: center;
    }

    .table_scoreCard .semaforo-verde{
        background-color: green;
    }

    .table_scoreCard .semaforo-amarillo{
        background-color: yellow;
    }

    .table_scoreCard .semaforo-rojo{
        background-color: red;
    }

    .table_scoreCard .item-semaforo{
        display: flex;
        justify-content: left;
        align-items: center;
        margin-bottom: 10px;
    }

    .table_indicador td{
        border: 1px solid;
        padding: 10px;
    }

    .table_indicador .title{
        font-weight: bold;
    }

    .table_indicador .semaforo-verde{
        background-color: green;
        width: 80px;
    }

    .table_indicador .semaforo-amarillo{
        background-color: yellow;
        width: 80px;
    }

    .table_indicador .semaforo-rojo{
        background-color: red;
        width: 80px;
    }

    .table_indicador td{
        white-space:normal;
    }


</style>
@endsection
@section('contenido')
<a href="{{route('proceso.indicador',$indicador->idProceso)}}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Volver</a>
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
                <div class="col-10 offset-1">
                    <table class="table_scoreCard">

                        <tbody>
                            <tr>

                                <td>
                                    <div class="metas">
                                        <h6 style="font-weight: bold;">OBJETIVO</h6>
                                        <p class="objetivo_text">{{$comando->objetivo}}</p>
                                    </div>
                                </td>

                                <td>
                                    <div style="width: 50px">
                                        <img src="/images/balance-flecha-rigth.png" alt="">
                                    </div>
                                </td>

                                <td>
                                    <div class="indicador">
                                        <h6 style="font-weight: bold;">INDICADOR</h6>
                                        <p class="indicador_text">{{$comando->indicador}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <img src="/images/balance-flecha-rigth.png" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div class="metas">
                                        <h6 style="font-weight: bold;">METAS</h6>
                                        <p class="meta_text">mayor a {{$comando->meta}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 50px">
                                        <img src="/images/balance-flecha-rigth.png" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div class="container-semaforo">
                                        <div class="item-semaforo">
                                            <div class="semaforo semaforo-verde">
                                            </div>
                                            <label class="semaforo-verde-text" for="">Mayor a {{$comando->condicionVerde}} %</label>
                                        </div>
                                        <div class="item-semaforo">
                                            <div class="semaforo semaforo-amarillo">
                                            </div>
                                            <label class="semaforo-amarillo-text" for="">De {{$comando->condicionVerde}}% a {{$comando->condicionRoja}}%</label>
                                        </div>
                                        <div class="item-semaforo">
                                            <div class="semaforo semaforo-rojo">
                                            </div>
                                            <label class="semaforo-rojo-text" for="">Menor a {{$comando->condicionRoja}}%</label>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="container-img-arriba">
                                        <img src="/images/balance-flecha-arriba.png" alt="">
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="container-img-arriba">
                                        <img src="/images/balance-flecha-arriba.png" alt="">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="4">

                                    <div class="iniciativas" style="">

                                        <h6 style="font-weight: bold; text-align: center">INICIATIVAS</h6>
                                        <p class="iniciativas-text">{{$comando->iniciativas}}</p>

                                    </div>

                                </td>
                                <td>
                                    <div>
                                        <img src="/images/balance-flecha-rigth.png" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div class="responsable">
                                        <h6 style="font-weight: bold;">RESPONSABLE</h6>
                                        <p class="responsable-text">{{$comando->responsable}}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-10 m-6 offset-1">
                    <table class="table table-response table_indicador">
                        <tbody>
                            <tr>
                                <td class="title" style=" width: 100px;">OBJETIVO</td>
                                <td colspan="7" class="objetivo_text">{{$comando->objetivo}} </td>
                            </tr>
                            <tr>
                                <td class="title" rowspan="2" style="">INDICADOR</td>
                                <td class="title" rowspan="2" style="width: 400px">FÓRMULA</td>
                                <td class="title" rowspan="2">LÍNEA BASE</td>
                                <td class="title" rowspan="2">VALOR META</td>
                                <td class="title" rowspan="2">FRECUENCIA DE MEDICIÓN</td>
                                <td class="title" colspan="3">CONDICIÓN</td>
                            </tr>
                            <tr>
                                <td class="semaforo-rojo"></td>
                                <td class="semaforo-amarillo"></td>
                                <td class="semaforo-verde"></td>
                            </tr>
                            <tr>
                                <td class="indicador_text">{{$comando->indicador}}</td>
                                <td class="formula_text">{{$indicador->formula}}</td>
                                <td class="lineaBase_text">{{$comando->lineaBase}}%</td>
                                <td class="meta_text">mayor a {{$comando->meta}}%</td>
                                <td class="frecuencia-text">{{$comando->frecuencia}}</td>
                                <td class="semaforo-rojo-text">Menor a {{$comando->condicionRoja}}%</td>
                                <td class="semaforo-amarillo-text">De {{$comando->condicionRoja}}% a {{$comando->condicionVerde}}%</td>
                                <td class="semaforo-verde-text">Mayor a {{$comando->condicionVerde}} %</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection