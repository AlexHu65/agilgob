<?php

use Illuminate\Database\Seeder;


use App\Sedes;

class EntrevistadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 10 ; $i++) { 

            //get sede id

            $sede_id = Sedes::where(['activo' => 1])->inRandomOrder()->first();

            if($sede_id){

                //only if sede_id

                DB::table('entrevistadores')->insert([
                    'nombre' => Str::random(10),
                    'sede_id' => $sede_id->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'activo' => 1            
                ]);
            }

        }

    }
}
