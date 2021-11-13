<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Services\Paystack;

class BankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $banks = Paystack::GetListOfBanks();
        $randomNumber = rand( 0, count($banks->data) - 1);
        // $shuffle = shuffle($randomNumber);
          // code...
          return [
             'name' => $banks->data[$randomNumber]->name,
             'slug' => $banks->data[$randomNumber]->slug,
             'bank_code' => $banks->data[$randomNumber]->code,
             'bank_id' => $banks->data[$randomNumber]->id
          ];
    }
}
