<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder{

	public function run(){
		\DB::table('users')->insert(array(
			'first_name'    => 'Admin',
			'last_name'     => 'Admin',
			'email'    		=> 'admin@curso.com',
			'password' 		=> \Hash::make('1234'),
			'type'     		=> 'admin'
 		));

 		\DB::table('user_profiles')->insert(array(
 			'user_id' => 1,
 			'birthdate' => '1990/08/02'
	 	));
	}
}