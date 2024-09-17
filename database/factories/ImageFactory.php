<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

           // 'url'=>'products/'.$this->faker->image('public/storage/products',600,400,null,false),

            'url' => '',
            'imageable_id' => null,
            'imageable_type' => null,


        ];
    }

    public function forProduct($product )
    {
        $url = $this->faker->image('public/storage/products', 400, 300, null, false);

        return $this->state([
            'url' => 'products/' . $url,
            'imageable_id' => $product->id,
            'imageable_type' => Product::class,
        ]);

    }

    public function forCategory( $category)
    {
        $url = $this->faker->image('public/storage/categories', 400, 300, null, false);

        return $this->state([
            'url' => 'categories/' . $url,
            'imageable_id' => $category->id,
            'imageable_type' => Category::class,
        ]);
    }
}

