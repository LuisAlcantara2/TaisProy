<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estrategia;
use App\Comando;
use DB;
use App\Auditoria;
use Carbon\Carbon;
use Auth;
class EstrategiaController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $estrategia=new estrategia();
            $estrategia->descripcion=$request->descripcion;
            $estrategia->tipo=$request->tipo;
            
            if($request->relaciones==null){
                $estrategia->idRelaciones="";
            }
            else{
                $estrategia->idRelaciones=$request->relaciones;
            }
            $estrategia->idProceso=$request->idProceso;
            //$estrategia->save();
            $id=$request->idProceso;
            //$comando->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='CREÓ ESTRATEGIA '. ' ' .$request->descripcion;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $estrategia->save();
            $auditoria->save();

            return redirect()->route('proceso.estrategia',$id)->with('datos','Registro Nuevo Guardado!!');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
        //{{route('empresa.estrategias',$itemempresa->idEmpresa)}}
    }
    public function edit($id)
    {
        if(Auth::check())
        {
            $estrategia=estrategia::findOrFail($id);
            return view('tablas/estrategiaes.edit',compact('estrategia'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function update(Request $request, $id)
    {
        if(Auth::check())
        {
            $var=estrategia::select('idProceso')->
            where('idestrategia','=',$id)->first();
            $estrategia=estrategia::findOrFail($id);
            $estrategia->descripcion=$request->descripcion;
            $estrategia->preg2=$request->preg2;
            $estrategia->preg3=$request->preg3;
            $estrategia->preg4=$request->preg4;
            $estrategia->preg5=$request->preg5;
            $estrategia->formula=$request->formula;
            //$estrategia->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='EDITÓ ESTRATEGIA'. ' ' .$request->descripcion;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $estrategia->save(); 
            $auditoria->save();
            
            return redirect()->route('proceso.estrategia',$var->idProceso)->with('datos','Registro Actualizado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function confirmar($id)
    {
        if(Auth::check())
        {
            $estrategia=estrategia::findOrFail($id);
            return view('tablas/estrategiaes.confirmar',compact('estrategia'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function destroy(Request $request, $idP)
    {
        if(Auth::check())
        {
            $id=estrategia::select('idProceso')->
            where('idestrategia','=',$idP)->first();
            $estrategia=estrategia::findOrFail($idP);
            DB::table('estrategia')->where('idestrategia', '=', $idP)->delete();
            //$estrategia->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='ELIMINÓ ESTRATEGIA'. ' ' .$estrategia->descripcion;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $estrategia->save();
            $auditoria->save();
    
            return redirect()->route('proceso.estrategia',$id->idProceso)->with('datos','Registro Eliminado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');

    }
}
