<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

use App\Services\Paystack;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->delete();

        $banks = Paystack::GetListOfBanks();
        Bank::factory()
             ->count(count($banks->data) )
             ->create();
    }
}
