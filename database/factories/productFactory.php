<?php

namespace Database\Factories;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'unitPrice' =>$this->faker->numberBetween(100,599),
            'quantity' => $this->faker->numberBetween(10,59),
            'description' => $this->faker->text(400),
            'imagePath' => $this->faker->imageUrl(400,400),
        ];
    }

    protected $model = product::class ;
}