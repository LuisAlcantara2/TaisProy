<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
    protected $table="estrategia";
    protected $primaryKey="idEstrategia";
    public $timestamps =false;
    protected $fillable = [
        'descripcion','tipo','idRelaciones','idProceso'
    ];
    public function proceso()
    {
        return $this->hasOne('App\Proceso','idProceso','idProceso');
    }   
}
