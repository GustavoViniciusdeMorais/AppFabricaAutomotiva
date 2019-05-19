<?php

use Illuminate\Database\Seeder;

class CarrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carros = DB::table('carros')->select('id', 'marca_id', 'cor_id', 'modelo_id', 'ano', 'foto', 'valor')->get();
    	if(!empty($carros)){
    		DB::table('carros')->delete();
    	}
        DB::table('carros')->insert(
        	['marca_id' => 1, 'cor_id' => 1, 'modelo_id' => 1, 'ano' => 2010, 'foto' => 'unoPreto.jpg', 'valor' => 30000]
        );
    }
}
