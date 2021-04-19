<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Comando;
use DB;
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
        $comando=new Comando();
        $comando->objetivo='';
        $comando->indicador=$request->preg1;
        $comando->condicionVerde='';
        $comando->condicionAmarilla='';
        $comando->condicionRoja='';
        $comando->iniciativas='';
        $comando->responsable='';
        $comando->frecuencia='';
        $comando->lineaBase='';
        $comando->meta='';
        $comando->idIndicador=$indicador->idIndicador;
        $comando->save();
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
    public function confirmar($id)
    {
        $indicador=Indicador::findOrFail($id);
        return view('tablas/indicadores.confirmar',compact('indicador'));
    }
    public function destroy($idP)
    {
        $id=Indicador::select('idProceso')->
        where('idIndicador','=',$idP)->first();
        $indicador=Indicador::findOrFail($idP);
        DB::table('indicador')->where('idIndicador', '=', $idP)->delete();
        $indicador->save();
        return redirect()->route('proceso.indicador',$id->idProceso)->with('datos','Registro Eliminado');
    }
    public function comando($id)
    {
        $indicador=Indicador::findOrFail($id);
        $comando=Comando::where('idIndicador','=',$id)->first();
        return view('tablas/comando.index',compact('indicador','comando'));
    }
    public function tablero($id)
    {
        $indicador=Indicador::findOrFail($id);
        $comando=Comando::where('idIndicador','=',$id)->first();
        return view('tablas/comando.tablero',compact('comando','indicador'));
    }
}
