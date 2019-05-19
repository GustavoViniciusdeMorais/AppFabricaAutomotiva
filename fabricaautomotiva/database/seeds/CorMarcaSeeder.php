<?php

use Illuminate\Database\Seeder;

class CorMarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cor_marca = DB::table('cor_marca')->select('id', 'marca_id', 'cor_id')->get();
    	if(!empty($cor_marca)){
    		DB::table('cor_marca')->delete();
    	}
        DB::table('cor_marca')->insert([
        	['marca_id' => 1, 'cor_id' => 1],
        	['marca_id' => 1, 'cor_id' => 3],
        	['marca_id' => 2, 'cor_id' => 2],
        	['marca_id' => 3, 'cor_id' => 1],
        	['marca_id' => 3, 'cor_id' => 2],
        	['marca_id' => 3, 'cor_id' => 3]
        ]);
    }
}
