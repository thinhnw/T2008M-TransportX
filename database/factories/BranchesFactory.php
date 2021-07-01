<?php

namespace Database\Factories;

use App\Models\Branches;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branches::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'zip_code' => $this->faker->postcode,
            'phone_number' => $this->faker->phoneNumber
        ];   
    }
}
