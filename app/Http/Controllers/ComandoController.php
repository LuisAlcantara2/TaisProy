<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comando;
use App\Indicador;
use DB;
class ComandoController extends Controller
{
    public function update(Request $request, $id)
    {
        $var=Comando::select('idIndicador')->
        where('idComando','=',$id)->first();
        $var2=Indicador::select('idProceso')->
        where('idIndicador','=',$var->idIndicador)->first();
        $conama="hola";
        $comando=Comando::findOrFail($id);
        $comando->objetivo=$request->obj;
        $comando->condicionVerde=$request->cap;
        $comando->condicionAmarilla=$conama;
        $comando->condicionRoja=$request->cma;
        $comando->iniciativas=$request->ini;
        $comando->responsable=$request->resp;
        $comando->frecuencia=$request->fre;
        $comando->lineaBase=$request->base;
        $comando->meta=$request->meta;
        $comando->save(); 
        return redirect()->route('proceso.indicador',$var2->idProceso)->with('datos','Registro Actualizado');
    }
}
