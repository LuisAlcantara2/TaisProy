<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comando extends Model
{
    protected $table="comando";
    protected $primaryKey="idComando";
    public $timestamps =false;
    protected $fillable = [
        'objetivo','indicador','condicionVerde','condicionAmarrilla','condicionRoja','iniciativas','responsable','frecuencia','lineaBase','meta','idIndicador'
    ];
    public function user()
    {
        return $this->hasOne('App\Indicador','idIndicador','idIndicador');
    }   
}
