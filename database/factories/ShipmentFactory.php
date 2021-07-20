<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->numberBetween(0, 1),
            'branch_id' => $this->faker->numberBetween(1, 2),
            'from_address' => $this->faker->address,
            'to_address' => $this->faker->address,
            'from_date' => $this->faker->dateTimeBetween('2021-07-02 00:00:00', '2021-07-03 00:00:00' ),
            'to_date' => $this->faker->dateTimeBetween('2021-07-03 00:00:00', '2021-07-10 00:00:00' ),
        ];
    }
}
