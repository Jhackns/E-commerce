<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $products = Product::factory(10)->create();

        // foreach ($products as $product) {
        //     Image::factory(1)->forProduct($product)->create([
        //         // 'imageable_id' => $product->id,
        //         // 'imageable_type' => Product::class,
        //     ]);

        // }

        $faker = Faker::create();

        $products = [
            [
                'name' => 'Laptop Model A',
                'description' => 'JP Laptop para juegos de 15.6 de 256GB',
                'image' => 'laptop.jpg',
                'category_id'=> 1
            ],
            [
                'name' => 'Desktop Model B',
                'description' => 'Gafas de realidad virtual Safay GEN 2 de 256 GB con mandos táctiles',
                'image' => 'virtual.jpg',
                'category_id'=> 2
            ],
            [
                'name' => 'auricular Model C',
                'description' => 'Audífonos inalámbricos con cancelación del ruido',
                'image' => 'audio.jpg',
                'category_id'=> 3
            ],
            [
                'name' => 'Phone Model D',
                'description' => 'Smartphone Z Pixel Max 128GB desbloqueado',
                'image' => 'celular.jpg',
                'category_id'=> 4
            ],
            [
                'name' => 'dron Model E',
                'description' => 'HKI Tech drone cuadricóptero con cámara y mando 360',
                'image' => 'dron.jpg',
                'category_id'=> 5
            ],
            [
                'name' => 'reloj Model F',
                'description' => 'Fitboot fitness con seguimiento del ritmo cardíaco',
                'image' => 'reloj.jpg',
                'category_id'=> 6
            ],

        ];

        foreach ($products as $productData) {
            $product = Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $faker->randomFloat(2, 10, 1000), // Generado por Faker
                'stock' => $faker->numberBetween(1, 100), // Generado por Faker
                'discount' => $faker->numberBetween(0,40),
                'category_id' => $productData['category_id'], // Asignación aleatoria de categorías existentes
            ]);

            Image::create([
                'url' => 'categories/' . $productData['image'],
                'imageable_id' => $product->id,
                'imageable_type' => Product::class,
            ]);
        }
    }

}




