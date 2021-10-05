<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->delete();
      $categories = [
          ['category' => 'food'],
          ['category' => 'chill'],
          ['category' => 'data'],
          ['category' => 'airtime'],
          ['category' => 'transport'],
          ['category' => 'books'],
          ['category' => 'software'],
          ['category' => 'inventory'],
          ['category' => 'giveaway'],
          ['category' => 'clothing/accesories'],
          ['category' => 'savings'],
          ['category' => 'investment'],
          ['category' => 'health/wellness']
        ];
      // $categories = ['Food', 'Chill', 'Data', 'Airtime', 'Transport', 'Books', 'Software', 'Inventory'];
      // foreach ($categories as $category) {
        // code...
        DB::table('categories')->insert($categories);
      // }
      //
    }
}
