<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $package_height = $this->faker->numberBetween(1, 20);
        $package_width = $this->faker->numberBetween(1, 20);
        $package_length = $this->faker->numberBetween(1, 20);
        $package_weight = $this->faker->numberBetween(1, 20);
        return [
            'height' => $package_height,
            'width' => $package_width,
            'length' => $package_length,
            'weight' => $package_weight,
            'branch_id' => 0
        ];
    }
}
