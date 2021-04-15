<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table="procesos";
    protected $primaryKey="idProceso";
    public $timestamps =false;
    protected $fillable = [
        'descripcion','tipo','idEmpresa',
    ];
    public function empresa()
    {
        return $this->hasOne('App\Empresa','idEmpresa','idEmpresa');
    }   
}
