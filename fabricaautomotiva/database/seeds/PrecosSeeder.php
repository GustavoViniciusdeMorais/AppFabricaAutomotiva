<?php

use Illuminate\Database\Seeder;

class PrecosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $precos = DB::table('precos')->select('id', 'valor', 'cor_id')->get();
    	if(!empty($precos)){
    		DB::table('precos')->delete();
    	}
        DB::table('precos')->insert([
        	['valor' => 30000, 'cor_id' => 1],
        	['valor' => 40000, 'cor_id' => 2],
        	['valor' => 60000, 'cor_id' => 3]
        ]);
    }
}
