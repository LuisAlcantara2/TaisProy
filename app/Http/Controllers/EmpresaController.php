<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Empresa;
use App\Proceso;
use App\Auditoria;
use Carbon\Carbon;
class EmpresaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
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
    public function create()
    {
        return view('tablas/empresas.create');
    }
    public function store(Request $request)
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
        $empresa->save();
        $auditoria=new Auditoria();
        $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
        $auditoria->email=auth()->user()->email;
        $auditoria->movimiento='CREÓ EMPRESA'. ' ' .$request->nombre. ' ' .'CON RUC'. ' ' .$request->ruc;
        $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
        $date = $dt->format('d-m-Y H:i');
        $auditoria->fecha=$date;
        $auditoria->save();

        return redirect()->route('empresa.index')->with('datos','Registro Nuevo Guardado!!');
    }
    public function edit($id)
    {
        $empresa=Empresa::findOrFail($id);
        return view('tablas/empresas.edit',compact('empresa'));
    }
    public function update(Request $request, $id)
    {
        $empresa=Empresa::findOrFail($id);
        $empresa->ruc=$request->ruc;
        $empresa->nombre=$request->nombre;
        $empresa->tipo=$request->tipo;
        $empresa->giro=$request->giro;
        $empresa->domicilio=$request->domicilio;
        $empresa->telefono=$request->telefono;
        $empresa->correo=$request->correo;
        $empresa->save(); 
        $auditoria=new Auditoria();
        $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
        $auditoria->email=auth()->user()->email;
        $auditoria->movimiento='EDITÓ EMPRESA'. ' ' .$request->nombre. ' ' .'CON RUC'. ' ' .$request->ruc;
        $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
        
        $date = $dt->format('d-m-Y H:i');
        $auditoria->fecha=$date;
        $auditoria->save();
        return redirect()->route('empresa.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $empresa=Empresa::findOrFail($id);
        return view('tablas/empresas.confirmar',compact('empresa'));
    }
    public function destroy(Request $request, $id)
    {
        $empresa=Empresa::findOrFail($id);
        DB::table('empresa')->where('idEmpresa', '=', $id)->delete();
        $empresa->save(); 
        $auditoria=new Auditoria();
        $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
        $auditoria->email=auth()->user()->email;
        $auditoria->movimiento='ELIMINÓ EMPRESA'. ' ' .$empresa->nombre. ' ' .'CON RUC'. ' ' .$empresa->ruc;
        $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
        
        $date = $dt->format('d-m-Y H:i');
        $auditoria->fecha=$date;
        $auditoria->save();
        return redirect()->route('empresa.index')->with('datos','Registro Eliminado');
    }
    public function procesos($id)
    {
        //$buscarpor=$request->buscarpor;
        $proceso=Proceso::
        where('idEmpresa','=',$id)->
        paginate($this::PAGINATION);
        return view('tablas/procesos/index',compact('id','proceso','buscarpor'));
    }
    public function createP($request)
    {
        $id=$request;
        return view('tablas/procesos.create',compact('id'));
    }
}
