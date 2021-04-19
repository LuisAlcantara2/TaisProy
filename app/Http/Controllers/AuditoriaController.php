<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditoria;
use Auth;
class AuditoriaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        if(Auth::check())
        {
            if(auth()->user()->is_admin==1)
            {
                $auditoria=Auditoria::orderBy('fecha','desc')->
                paginate($this::PAGINATION);
                return view('tablas/auditorias/index',compact('auditoria'));
            }
            else
            {
                return redirect()->route('home');
            }
        }

        return view('/auth/login')->with('datos','Inicie sesión porfavor');
        
    }
}
