<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Proceso;

use App\Empresa;
class ProcesoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $proceso=Proceso::
        where('idEmpresa','=',$buscarpor)->
        paginate($this::PAGINATION);
        return view('tablas/procesos/index',compact('proceso','buscarpor'));
    }
    public function create(Request $request)
    {
        $id=$request;
        return view('tablas/procesos.create',compact('$id'));
    }
    public function store(Request $request)
    {
        $proceso=new Proceso();
        $proceso->descripcion=$request->descripcion;
        $proceso->tipo=$request->tipo;
        $proceso->idEmpresa=$request->idEmpresa;
        $proceso->save();
        $id=$request->idEmpresa;
        return redirect()->route('empresa.procesos',$id)->with('datos','Registro Nuevo Guardado!!');
        //{{route('empresa.procesos',$itemempresa->idEmpresa)}}
    }
    public function edit($id)
    {
        $proceso=Proceso::findOrFail($id);
        return view('tablas/procesos.edit',compact('proceso'));
    }
    public function update(Request $request, $id)
    {
        $var=Proceso::select('idEmpresa')->
        where('idProceso','=',$id)->first();
        $proceso=Proceso::findOrFail($id);
        $proceso->descripcion=$request->descripcion;
        $proceso->tipo=$request->tipo;
        $proceso->save(); 
        return redirect()->route('empresa.procesos',$var->idEmpresa)->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $proceso=Proceso::findOrFail($id);
        return view('tablas/procesos.confirmar',compact('proceso'));
    }
    public function destroy($idP)
    {
        $id=Proceso::select('idEmpresa')->
        where('idProceso','=',$idP)->first();
        $proceso=Proceso::findOrFail($idP);
        DB::table('procesos')->where('idProceso', '=', $idP)->delete();
        $proceso->save();
        return redirect()->route('empresa.procesos',$id->idEmpresa)->with('datos','Registro Eliminado');
    }
    

}