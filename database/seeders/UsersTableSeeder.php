<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Expenses;

use Illuminate\Database\Eloquent\Factories\Sequence;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        User::factory()
              ->count(20)
              ->hasExpenses(100)
              ->hasVerification()
              ->create();
    }
}
