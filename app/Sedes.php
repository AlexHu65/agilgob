<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $table =  'sedes';

    public function citas(){
        return $this->belongsToMany(Citas::class,'citas_sedes', 'sede_id', 'cita_id');
    }
}
