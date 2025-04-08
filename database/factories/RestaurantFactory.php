<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Liste de chaînes de restaurants connus
        $restaurantNames = [
            'McDonald\'s', 'Burger King', 'KFC', 'Pizza Hut', 'Domino\'s Pizza',
            'Starbucks', 'Subway', 'Five Guys', 'Taco Bell', 'Panda Express',
            'Chipotle', 'Denny\'s', 'Wendy\'s', 'Arby\'s', 'In-N-Out Burger',
            'Shake Shack', 'Sbarro', 'Papa John\'s Pizza', 'Chick-fil-A', 'Café de la Paix',
            'Le Relais de l\'Entrecôte', 'Bistrot Paul Bert', 'Chez L\'Ami Jean', 'La Table de Joel Robuchon',
            'L\'Avenue', 'Nobu', 'La Coupole', 'Le Procope', 'La Truffière', 'Ralph\'s',
            'Ladurée', 'Pierre Hermé', 'Fauchon', 'Café Pouchkine', 'Le Bouillon Chartier',
            'Le Bistrot du Sommelier', 'Le Cinq', 'Boucherie les Provinces', 'Bistronomie', 'Le Georges'
        ];

        return [
            'name' => $this->faker->randomElement($restaurantNames),  // Utilise un restaurant aléatoire de la liste

            // 'created_at' => now(),
        ];
    }
}
