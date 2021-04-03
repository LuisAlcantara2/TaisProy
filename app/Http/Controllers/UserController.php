<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $user=User::
        where('nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
        return view('tablas/users/index',compact('user','buscarpor'));
    }
    public function create()
    {
        return view('tablas/users.create');
    }
    public function store(Request $request)
    {
        $user=new User();
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->dni=$request->dni;
        $user->email=$request->correo;
        $user->direccion=$request->domicilio;
        $user->telefono=$request->telefono;
        $user->password=Hash::make($request->contraseña);
        $user->is_admin=$request->is_admin;
        $user->save();
        return redirect()->route('user.index')->with('datos','Registro Nuevo Guardado!!');
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('tablas/users.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user=new User();
        $user->nombre=$request->nombre;
        $user->apellido=$request->apellido;
        $user->dni=$request->dni;
        $user->email=$request->correo;
        $user->direccion=$request->domicilio;
        $user->telefono=$request->telefono;
        $user->save(); 
        return redirect()->route('user.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $user=User::findOrFail($id);
        return view('tablas/users.confirmar',compact('user'));
    }
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        DB::table('user')->where('id', '=', $id)->delete();
        $user->save(); 
        return redirect()->route('user.index')->with('datos','Registro Eliminado');
    }
}
