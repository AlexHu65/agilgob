<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $table = 'citas';

    public function sedes(){
        return $this->belongsToMany(Sedes::class,'citas_sedes', 'cita_id', 'sede_id');
    }    

    public function entrevistador(){
        return $this->belongsTo(Entrevistador::class);
    }
}