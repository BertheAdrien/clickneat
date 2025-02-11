<?php

namespace Database\Seeders;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Restaurant::factory(10)->create();

        Category::factory(10)->create();

        Item::factory(30)->create();
    }


}
