@extends('layouts.plantilla')
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
                <div class="col-10 offset-1">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <h3 style="font-weight: bold;">FINANCIERA</h3>
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        @foreach($estrategia as $itemestrategia)
                                        @if($itemestrategia->tipo==0)
                                        <p>{{$itemestrategia->descripcion}}</p>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <h3 style="font-weight: bold;">CLIENTE</h3>
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        @foreach($estrategia as $itemestrategia)
                                        @if($itemestrategia->tipo==1)
                                        <p>{{$itemestrategia->descripcion}}</p>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <h3 style="font-weight: bold;">PROCESO DE NEGOCIO</h3>
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        @foreach($estrategia as $itemestrategia)
                                        @if($itemestrategia->tipo==2)
                                        <p>{{$itemestrategia->descripcion}}</p>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <h3 style="font-weight: bold;">APRENDIZAJE Y CONOCIMIENTO</h3>
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        @foreach($estrategia as $itemestrategia)
                                        @if($itemestrategia->tipo==3)
                                        <p>{{$itemestrategia->descripcion}}</p>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection