<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cors = DB::table('cors')->select('id', 'nome')->get();
    	if(!empty($cors)){
    		DB::table('cors')->delete();
    	}
        DB::table('cors')->insert([['nome' => 'Preto'],['nome' => 'Prata'],['nome' => 'Branco']]);
    }
}
