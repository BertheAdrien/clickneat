<?php

namespace Database\Seeders;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@yahoo.fr',
            'role' => 'admin',
            'password' => Hash::make('Pokemon72380'),
        ]);
        User::factory()->create([
            'name' => 'client',
            'email' => 'client@yahoo.fr',
            'role' => 'client',
            'password' => Hash::make('Pokemon72380'),
        ]);
        User::factory()->create([
            'name' => 'restaurant',
            'email' => 'restaurant@yahoo.fr',
            'role' => 'restaurant',
            'password' => Hash::make('Pokemon72380'),
        ]);

        // 10 clients
        User::factory(10)->create([
            'role' => 'client',
            'password' => Hash::make('Pokemon72380'),
        ]);

        // 10 restaurants
        Restaurant::factory(10)->create();

        // 10 categories
        Category::factory(10)->create();

        // 30 items
        Item::factory(30)->create();
    }


}
