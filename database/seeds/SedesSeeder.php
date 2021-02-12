<?php

use Illuminate\Database\Seeder;

use App\Sedes;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        
        $sede_inicio = '2021-03-01 09:00:00';
        $sede_fin = '2021-03-14 17:00:00';

        $sedes = Sedes::where(['activo' => 1])->get();      
        
        //seed only if not exists        
        if($sedes->count() <= 0){
            
            for ($i=0; $i < 3; $i++) { 

                $num_rand = rand(1, 200);
                $num_rand2 = rand(1,55);            
    
                DB::table('sedes')->insert([
                    'nombre' => 'Sede Num' .  ($i + 1) ,
                    'direccion' => 'Calle ejemplo #' . $num_rand2 . ' Col. de Ejemplo ' . $num_rand,
                    'sede_inicio' => $sede_inicio,
                    'sede_fin' => $sede_fin,
                    'created_at' => date('Y-m-d H:i:s'),
                    'activo' => 1            
                ]);
            }   
        }             
    }
}
