<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
 	* Run the database seeds.
 	* @param $users 
 	* @return void
 	*/
    public function run()
    {
        
		$users = [
            [
            	'name' => 'Masande',
                'last_name' => 'Mbondwana', 
            	'username' => 'masande',  
             	'email' => 'masande@gmail.com',
              	'password' => bcrypt('passmasande')
            ],
            [ 
            	'name' => 'Methys', 
                'last_name' => 'Assessment', 
            	'name' => 'methys', 
            	'email' => 'methys@gmail.com',
        	 	'password' => bcrypt('passmethys')
            ],
        ];

        DB::table('users')->insert($users);
    }
}
