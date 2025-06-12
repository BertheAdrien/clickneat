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
        Restaurant::factory(25)->create();
    
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
            'restaurant_id' => 1,
            'password' => Hash::make('Pokemon72380'),
        ]);
    
        User::factory(10)->create([
            'role' => 'client',
            'password' => Hash::make('Pokemon72380'),
        ]);
    
        Category::factory(30)->create();
    
        $categoryIds = Category::pluck('id')->toArray();
    
        Item::factory(50)->make()->each(function ($item) use ($categoryIds) {
            $item->category_id = $categoryIds[array_rand($categoryIds)];
            $item->save();
        });
    }

}

