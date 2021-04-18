<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
class IndicadorController extends Controller
{
    public function store(Request $request)
    {
        $indicador=new Indicador();
        $indicador->preg1=$request->preg1;
        $indicador->preg2=$request->preg2;
        $indicador->preg3=$request->preg3;
        $indicador->preg4=$request->preg4;
        $indicador->preg5=$request->preg5;
        $indicador->formula=$request->formula;
        $indicador->idProceso=$request->idProceso;
        $indicador->save();
        $id=$request->idProceso;
        return redirect()->route('proceso.indicador',$id)->with('datos','Registro Nuevo Guardado!!');
        //{{route('empresa.indicadors',$itemempresa->idEmpresa)}}
    }
    public function edit($id)
    {
        $indicador=indicador::findOrFail($id);
        return view('tablas/indicadores.edit',compact('indicador'));
    }
    public function update(Request $request, $id)
    {
        $var=indicador::select('idProceso')->
        where('idindicador','=',$id)->first();
        $indicador=indicador::findOrFail($id);
        $indicador->preg1=$request->preg1;
        $indicador->preg2=$request->preg2;
        $indicador->preg3=$request->preg3;
        $indicador->preg4=$request->preg4;
        $indicador->preg5=$request->preg5;
        $indicador->formula=$request->formula;
        $indicador->save(); 
        return redirect()->route('proceso.indicador',$var->idProceso)->with('datos','Registro Actualizado');
    }
}
