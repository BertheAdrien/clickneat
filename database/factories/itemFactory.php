<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Liste des noms d'items prédéfinis
        $itemNames = [
            'Coca-Cola', 'Fanta', 'Ice Tea', 'Sprite', 'Pepsi',
            'Orangina', 'Red Bull', 'Eau minérale', 'Eau gazeuse',
            'Limonade', 'Café', 'Thé', 'Chocolat chaud', 'Milkshake',
            'Smoothie', 'Mojito', 'Jus d\'orange', 'Jus de pomme'
        ];

        return [
            'name' => fake()->randomElement($itemNames),
            'category_id' => random_int(1, 10),
            'cost' => random_int(1, 50000), 
            'price' => random_int(50001, 100000), 
        ];
    }
}

