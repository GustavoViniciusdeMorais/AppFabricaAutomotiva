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
        $this->call(CorsSeeder::class);
        $this->call(MarcasSeeder::class);
        $this->call(CorMarcaSeeder::class);
        $this->call(ModelosSeeder::class);
        $this->call(PrecosSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CarrosSeeder::class);
    }
}
