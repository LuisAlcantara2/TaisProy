<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Auditoria;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        if(Auth::check())
        {
            $buscarpor=$request->buscarpor;
            $user=User::
            where('nombre','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
            return view('tablas/users/index',compact('user','buscarpor'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function create()
    {
        if(Auth::check())
        {
            return view('tablas/users.create');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function store(Request $request)
    {
        if(Auth::check())
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
            //$user->save();
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='CREÓ USUARIO'. ' ' .$request->nombre. ' ' .$request->apellido. ' ' .'CON DNI'. ' ' .$request->dni;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $user->save();
            $auditoria->save();
            return redirect()->route('user.index')->with('datos','Registro Nuevo Guardado!!');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function edit($id)
    {
        if(Auth::check())
        {
            $user=User::findOrFail($id);
            return view('tablas/users.edit',compact('user'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function update(Request $request, $id)
    {
        if(Auth::check())
        {
            $user=User::findOrFail($id);
            $user=new User();
            $user->nombre=$request->nombre;
            $user->apellido=$request->apellido;
            $user->dni=$request->dni;
            $user->email=$request->correo;
            $user->direccion=$request->domicilio;
            $user->telefono=$request->telefono;
            //$user->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='EDITÓ USUARIO'. ' ' .$request->nombre. ' ' .$request->apellido. ' ' .'CON DNI'. ' ' .$request->dni;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $user->save();
            $auditoria->save();
            return redirect()->route('user.index')->with('datos','Registro Actualizado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function confirmar($id)
    {
        if(Auth::check())
        {
            $user=User::findOrFail($id);
            return view('tablas/users.confirmar',compact('user'));
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
    public function destroy(Request $request, $id)
    {
        if(Auth::check())
        {
            $user=User::findOrFail($id);
            DB::table('user')->where('id', '=', $id)->delete();
            //$user->save(); 
            $auditoria=new Auditoria();
            $auditoria->usuario=auth()->user()->nombre. ' ' .auth()->user()->apellido;
            $auditoria->email=auth()->user()->email;
            $auditoria->movimiento='ELIMINÓ USUARIO'. ' ' .$user->nombre. ' ' .$user->apellido. ' ' .'CON DNI'. ' ' .$user->dni;
            $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Lima');
            $date = $dt->format('d-m-Y H:i');
            $auditoria->fecha=$date;
            $user->save(); 
            $auditoria->save();
            return redirect()->route('user.index')->with('datos','Registro Eliminado');
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
}
