<?php

use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = DB::table('marcas')->select('id', 'nome')->get();
    	if(!empty($marcas)){
    		DB::table('marcas')->delete();
    	}
        DB::table('marcas')->insert([['nome' => 'Fiat'],['nome' => 'Volkswagen'],['nome' => 'Hyundai']]);
    }
}
