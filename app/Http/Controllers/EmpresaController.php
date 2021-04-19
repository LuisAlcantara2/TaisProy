<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Empresa;
use App\Proceso;
use App\Auditoria;
use Carbon\Carbon;
use Auth;
class EmpresaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        if(Auth::check())
        {
            if(auth()->user()->is_admin==1)
            {
                $buscarpor=$request->buscarpor;
                $empresa=Empresa::
                where('idEmpresa','like','%'.$buscarpor.'%')
                ->paginate($this::PAGINATION);
                return view('tablas/empresas/index',compact('empresa','buscarpor'));
            }
            else{
                $buscarpor=$request->buscarpor;
                $empresa=Empresa::
                where('idEmpresa','like','%'.$buscarpor.'%')->
                where('idUser','=',auth()->user()->id)
                ->paginate($this::PAGINATION);
                return view('tablas/empresas/index',compact('empresa','buscarpor'));
            }
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
        
    }
    public function create()
    {
        if(Auth::check())
        {
            return view('tablas/empresas.create');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $empresa=new Empresa();
            $empresa->ruc=$request->ruc;
            $empresa->nombre=$request->nombre;
            $empresa->tipo=$request->tipo;
            $empresa->giro=$request->giro;
            $empresa->domicilio=$request->domicilio;
            $empresa->telefono=$request->telefono;
            $empresa->correo=$request->correo;
            $empresa->idUser=auth()->user()->id;
            //$empresa->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='CREÓ EMPRESA'. ' ' .$request->nombre. ' ' .'CON RUC'. ' ' .$request->ruc;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $empresa->save();
            $auditoria->save();
    
            return redirect()->route('empresa.index')->with('datos','Registro Nuevo Guardado!!');
    
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
    }
    public function edit($id)
    {
        if(Auth::check())
        {
            $empresa=Empresa::findOrFail($id);
            return view('tablas/empresas.edit',compact('empresa'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function update(Request $request, $id)
    {
        if(Auth::check())
        {
            $empresa=Empresa::findOrFail($id);
            $empresa->ruc=$request->ruc;
            $empresa->nombre=$request->nombre;
            $empresa->tipo=$request->tipo;
            $empresa->giro=$request->giro;
            $empresa->domicilio=$request->domicilio;
            $empresa->telefono=$request->telefono;
            $empresa->correo=$request->correo;
            //$empresa->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='EDITÓ EMPRESA'. ' ' .$request->nombre. ' ' .'CON RUC'. ' ' .$request->ruc;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $empresa->save(); 
            $auditoria->save();
            return redirect()->route('empresa.index')->with('datos','Registro Actualizado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function confirmar($id)
    {
        if(Auth::check())
        {
            $empresa=Empresa::findOrFail($id);
            return view('tablas/empresas.confirmar',compact('empresa'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
    }
    public function destroy(Request $request, $id)
    {
        if(Auth::check())
        {
            $empresa=Empresa::findOrFail($id);
            DB::table('empresa')->where('idEmpresa', '=', $id)->delete();
            //$empresa->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='ELIMINÓ EMPRESA'. ' ' .$empresa->nombre. ' ' .'CON RUC'. ' ' .$empresa->ruc;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $empresa->save(); 
            $auditoria->save();
            return redirect()->route('empresa.index')->with('datos','Registro Eliminado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function procesos($id)
    {
        if(Auth::check())
        {
            $proceso=Proceso::
            where('idEmpresa','=',$id)->
            paginate($this::PAGINATION);
            return view('tablas/procesos/index',compact('id','proceso','buscarpor'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        //$buscarpor=$request->buscarpor;
        
    }
    public function createP($request)
    {
        if(Auth::check())
        {
            $id=$request;
            return view('tablas/procesos.create',compact('id'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
}
