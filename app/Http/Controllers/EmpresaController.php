<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Empresa;

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
        return redirect()->route('empresa.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $empresa=Empresa::findOrFail($id);
        return view('tablas/empresas.confirmar',compact('empresa'));
    }
    public function destroy($id)
    {
        $empresa=Empresa::findOrFail($id);
        DB::table('empresa')->where('idEmpresa', '=', $id)->delete();
        $empresa->save(); 
        return redirect()->route('empresa.index')->with('datos','Registro Eliminado');
    }
}
