<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Proceso;
use App\Indicador;
use App\Empresa;
use App\Auditoria;
use Carbon\Carbon;
use Auth;
class ProcesoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        if(Auth::check())
        {
            $buscarpor=$request->buscarpor;
            $proceso=Proceso::
            where('idEmpresa','=',$buscarpor)->
            paginate($this::PAGINATION);
            return view('tablas/procesos/index',compact('proceso','buscarpor'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function create(Request $request)
    {
        if(Auth::check())
        {
            $id=$request;
            return view('tablas/procesos.create',compact('$id'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $proceso=new Proceso();
            $proceso->descripcion=$request->descripcion;
            $proceso->tipo=$request->tipo;
            $proceso->idEmpresa=$request->idEmpresa;
            $proceso->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='CREÓ PROCESO'. ' ' .$request->descripcion;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $auditoria->save();
            
            $id=$request->idEmpresa;
            return redirect()->route('empresa.procesos',$id)->with('datos','Registro Nuevo Guardado!!');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');

        //{{route('empresa.procesos',$itemempresa->idEmpresa)}}
    }
    public function edit($id)
    {
        if(Auth::check())
        {
            $proceso=Proceso::findOrFail($id);
            return view('tablas/procesos.edit',compact('proceso'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function update(Request $request, $id)
    {
        if(Auth::check())
        {
            $var=Proceso::select('idEmpresa')->
            where('idProceso','=',$id)->first();
            $proceso=Proceso::findOrFail($id);
            $proceso->descripcion=$request->descripcion;
            $proceso->tipo=$request->tipo;
            $proceso->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='EDITÓ PROCESO'. ' ' .$request->descripcion;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $auditoria->save();
            return redirect()->route('empresa.procesos',$var->idEmpresa)->with('datos','Registro Actualizado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function confirmar($id)
    {
        if(Auth::check())
        {
            $proceso=Proceso::findOrFail($id);
            return view('tablas/procesos.confirmar',compact('proceso'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function destroy(Request $request,$idP)
    {
        if(Auth::check())
        {
            $id=Proceso::select('idEmpresa')->
            where('idProceso','=',$idP)->first();
            $proceso=Proceso::findOrFail($idP);
            DB::table('procesos')->where('idProceso', '=', $idP)->delete();
            $proceso->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='ELIMINÓ PROCESO'. ' ' .$proceso->descripcion;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $auditoria->save();
            return redirect()->route('empresa.procesos',$id->idEmpresa)->with('datos','Registro Eliminado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function indicador($id)
    {
        if(Auth::check())
        {
            $indicador=Indicador::
            where('idProceso','=',$id)->
            paginate($this::PAGINATION);
            $proceso=Proceso::
            where('idProceso','=',$id)->first();
            return view('tablas/indicadores/index',compact('id','indicador','proceso'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function createI($request)
    {
        if(Auth::check())
        {
            $id=$request;
            return view('tablas/indicadores.create',compact('id'));    
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
    }
}
