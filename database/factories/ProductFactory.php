<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker -> name(),
            'description'=> $this->faker ->text(20),
            'price'=> $this->faker -> randomFloat( $nbMaxDecimals = 2, $min = 30, $max = 500),
            'stock'=> $this ->faker -> numberBetween($min = 10, $max = 50) ,
            'discount'=>$this->faker->numberBetween(5,40),
            'category_id'=> Category::all()->random()-> id,
            //'size_id'=> Size::all()->random()-> id,

        ];
    }
}
