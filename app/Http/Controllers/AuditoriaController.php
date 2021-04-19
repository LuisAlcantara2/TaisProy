<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditoria;
class AuditoriaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $auditoria=Auditoria::
        paginate($this::PAGINATION);
        return view('tablas/auditorias/index',compact('auditoria'));
    }
}
