<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comando;
use App\Indicador;
use DB;
use App\Auditoria;
use Carbon\Carbon;
use Auth;
class ComandoController extends Controller
{
    public function update(Request $request, $id)
    {
        if(Auth::check())
        {
            $var=Comando::select('idIndicador')->
            where('idComando','=',$id)->first();
            $var2=Indicador::select('idProceso','preg1')->
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
            //$comando->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='ACTUALIZÓ TABLERO DE INDICADOR'. ' ' .$var2->preg1;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $comando->save(); 
            $auditoria->save();
            return redirect()->route('proceso.indicador',$var2->idProceso)->with('datos','Registro Actualizado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
}
