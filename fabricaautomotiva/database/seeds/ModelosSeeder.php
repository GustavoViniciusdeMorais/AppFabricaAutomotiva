<?php

use Illuminate\Database\Seeder;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelos = DB::table('modelos')->select('id', 'marca_id', 'nome')->get();
    	if(!empty($modelos)){
    		DB::table('modelos')->delete();
    	}
        DB::table('modelos')->insert([
        	['marca_id' => 1, 'nome' => 'Uno'],
        	['marca_id' => 1, 'nome' => 'Strada'],
        	['marca_id' => 1, 'nome' => 'Toro'],
        	['marca_id' => 2, 'nome' => 'Gol'],
        	['marca_id' => 2, 'nome' => 'Fox'],
        	['marca_id' => 2, 'nome' => 'Saveiro'],
        	['marca_id' => 3, 'nome' => 'ix35'],
        	['marca_id' => 3, 'nome' => 'Tucson'],
        	['marca_id' => 3, 'nome' => 'Creta'],
        ]);
    }
}
