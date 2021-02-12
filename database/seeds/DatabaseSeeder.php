<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeed::class);
        $this->call(SedesSeeder::class);
        $this->call(EntrevistadorSeeder::class);
        $this->call(CitasSeeder::class);
    }
}
