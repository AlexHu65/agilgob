<?php

use Illuminate\Database\Seeder;


use App\Sedes;
use App\Citas;
use App\User;
use App\Entrevistador;
use App\CitasSedes;
use App\CitaEntrevistador;

class CitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 5; $i++) { 

            $user_id =  User::inRandomOrder()->first();
            $entrevistador_id =  Entrevistador::where(['activo' => 1])->inRandomOrder()->first();
            $sede_id =  Sedes::where(['activo' => 1])->inRandomOrder()->first();
        
            $citas = new Citas;
            $citas->user_id = $user_id->id;
            $citas->entrevistador_id = $entrevistador_id->id;
            $citas->hora_inicial = date('Y-m-d H:i:s');
            $citas->hora_final = date('Y-m-d H:i:s');
            $citas->activo = 1;            

            if($citas->save()){
                //save pivot
                $cita_id = $citas->id;
                $citas_sede = new CitasSedes;

                $citas_sede->sede_id = $sede_id->id;
                $citas_sede->cita_id = $cita_id;

                if($citas_sede->save()){

                    $citas_entrevistador = new CitaEntrevistador;
                    $citas_entrevistador->cita_id =  $cita_id;
                    $citas_entrevistador->entrevistador_id =  $entrevistador_id->id;
                    $citas_entrevistador->save();
                }
            }
        }
    }
}
