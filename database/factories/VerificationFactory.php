<?php

namespace Database\Factories;

use App\Models\Verification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VerificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Verification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'user_token' => Str::random(10),
           'isVerified' => false
        ];
    }
}
