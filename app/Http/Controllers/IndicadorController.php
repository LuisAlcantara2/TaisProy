<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Comando;
use DB;
use App\Auditoria;
use Carbon\Carbon;
use Auth;
class IndicadorController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $indicador=new Indicador();
            $indicador->preg1=$request->preg1;
            $indicador->preg2=$request->preg2;
            $indicador->preg3=$request->preg3;
            $indicador->preg4=$request->preg4;
            $indicador->preg5=$request->preg5;
            $indicador->formula=$request->formula;
            $indicador->idProceso=$request->idProceso;
            //$indicador->save();
            $id=$request->idProceso;
            $idIndi=Indicador::orderBy('idIndicador','desc')->first();
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
            $comando->idIndicador=$idIndi->idIndicador;
            //$comando->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='CREÓ INDICADOR '. ' ' .$request->preg1;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $indicador->save();
            $comando->save();
            $auditoria->save();

            return redirect()->route('proceso.indicador',$id)->with('datos','Registro Nuevo Guardado!!');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
        //{{route('empresa.indicadors',$itemempresa->idEmpresa)}}
    }
    public function edit($id)
    {
        if(Auth::check())
        {
            $indicador=indicador::findOrFail($id);
            return view('tablas/indicadores.edit',compact('indicador'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function update(Request $request, $id)
    {
        if(Auth::check())
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
            //$indicador->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='EDITÓ INDICADOR'. ' ' .$request->preg1;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $indicador->save(); 
            $auditoria->save();
            
            return redirect()->route('proceso.indicador',$var->idProceso)->with('datos','Registro Actualizado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function confirmar($id)
    {
        if(Auth::check())
        {
            $indicador=Indicador::findOrFail($id);
            return view('tablas/indicadores.confirmar',compact('indicador'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function destroy(Request $request, $idP)
    {
        if(Auth::check())
        {
            $id=Indicador::select('idProceso')->
            where('idIndicador','=',$idP)->first();
            $indicador=Indicador::findOrFail($idP);
            DB::table('indicador')->where('idIndicador', '=', $idP)->delete();
            //$indicador->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='ELIMINÓ INDICADOR'. ' ' .$indicador->preg1;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $indicador->save();
            $auditoria->save();
    
            return redirect()->route('proceso.indicador',$id->idProceso)->with('datos','Registro Eliminado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');

    }
    public function comando($id)
    {
        if(Auth::check())
        {
            $indicador=Indicador::findOrFail($id);
            $comando=Comando::where('idIndicador','=',$id)->first();
            return view('tablas/comando.index',compact('indicador','comando'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function tablero($id)
    {
        if(Auth::check())
        {
            $indicador=Indicador::findOrFail($id);
            $comando=Comando::where('idIndicador','=',$id)->first();
            return view('tablas/comando.tablero',compact('comando','indicador'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
}
