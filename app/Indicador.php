<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table="indicador";
    protected $primaryKey="idIndicador";
    public $timestamps =false;
    protected $fillable = [
        'preg1','preg2','preg3','preg4','preg5','formula','idProceso'
    ];
    public function user()
    {
        return $this->hasOne('App\Proceso','idProceso','idProceso');
    }   
}
