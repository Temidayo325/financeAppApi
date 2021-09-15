<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
   //      $users = [
   //      	[
	  //       	'name' => "Opeyemi Emmanuel",
	  //       	'email' => "temi325@gmail.com",
	  //       	"password" => Hash::make('zarachikempachi')
   //      	],
   //      	[
	  //       	'name' => "Aniyi Johnson",
	  //       	'email' => "hollalere@gmail.com",
	  //       	"password" => Hash::make('johnson')
	  //       ],
			// [
	  //       	'name' => "Omisola Idowu",
	  //       	'email' => "idowu@gmail.com",
	  //       	"password" => Hash::make('omisola')
	  //       ]
   //  	];
   //  	DB::table('users')->insert($users);
    }
}
