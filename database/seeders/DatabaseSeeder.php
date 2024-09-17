<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Database\Factories\CategoryFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this ->call(CategorySeeder::class);
        //$this->call(SizeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);



    }
}
