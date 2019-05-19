<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->select('id', 'name', 'email')->get();
    	if(!empty($users)){
    		DB::table('users')->delete();
    	}
        DB::table('users')->insert(['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin1234')]);
    }
}
