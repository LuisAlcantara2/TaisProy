<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table="empresa";
    protected $primaryKey="idEmpresa";
    public $timestamps =false;
    protected $fillable = [
        'ruc','nombre','tipo','giro','domicilio','telefono','correo','idUser',
    ];
    public function user()
    {
        return $this->hasOne('App\User','id','idUser');
    }   
}
