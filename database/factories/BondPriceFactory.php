<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BondPrice;

class BondPriceFactory extends Factory
{
    protected $model = BondPrice::class;

    public function definition(): array
    {
        return [
            'country_code' => $this->faker->randomElement(['BE', 'FR', 'GE', 'IT', 'ES']),
            'years' => 1,
            'price' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}
