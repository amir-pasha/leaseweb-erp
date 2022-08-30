<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'asset_id' => rand(1,1000),
            'name' => $this->faker->name,
            'price' => rand(50, 100),
            'brand_id' => Brand::query()->inRandomOrder()->first()
        ];
    }
}
