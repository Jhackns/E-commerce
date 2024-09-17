<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $categories = Category::factory(5)->create();

        // foreach ($categories as $category) {
        //     Image::factory(1)->forCategory( $category)->create([
        //         // 'imageable_id' => $category->id,
        //         // 'imageable_type' => Category::class,
        //     ]);

        // }

        $categories = [
            ['name' => 'Laptops', 'description' => 'Category for Laptops', 'image' => 'laptop.jpg'],
            ['name' => 'Desktops', 'description' => 'Category for Desktops', 'image' => 'virtual.jpg'],
            ['name' => 'Audio', 'description' => 'Category for Tablets', 'image' => 'audio.jpg'],
            ['name' => 'Phones', 'description' => 'Category for Phones', 'image' => 'celular.jpg'],
            ['name' => 'Cameras', 'description' => 'Category for Cameras', 'image' => 'dron.jpg'],
            ['name' => 'Accessories', 'description' => 'Category for Accessories', 'image' => 'reloj.jpg'],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'description' => $categoryData['description'],
            ]);

            Image::create([
                'url' => 'categories/' . $categoryData['image'],
                'imageable_id' => $category->id,
                'imageable_type' => Category::class,
            ]);
        }
}
}
