<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table="auditoria";
    protected $primaryKey="idMovimiento";
    public $timestamps =false;
    protected $fillable = [
        'usuario','email','movimiento','fecha','hora'
    ];
}
