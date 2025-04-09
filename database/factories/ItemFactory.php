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
            'Smoothie', 'Mojito', 'Jus d\'orange', 'Jus de pomme',
            'Pizza Margherita', 'Pizza Pepperoni', 'Pizza Végétarienne', 'Pizza Quatre Saisons', 'Calzone',
            'Burger Classique', 'Cheeseburger', 'Burger Poulet', 'Burger Végétarien', 'Hot Dog',
            'Spaghetti Bolognese', 'Spaghetti Carbonara', 'Lasagnes', 'Raviolis', 'Pâtes Pesto',
            'Gratin Dauphinois', 'Bœuf Bourguignon', 'Poulet rôti', 'Tartiflette', 'Quiche Lorraine',
            'Salade César', 'Salade de fruits', 'Salade Grecque', 'Taboulé', 'Hummus avec pain pita',
            'Sushi', 'Makis', 'Temaki', 'Sashimi', 'Yakimeshi',
            'Paella', 'Paella de fruits de mer', 'Risotto', 'Moules Marinières', 'Bouillabaisse',
            'Fish and Chips', 'Sole Meunière', 'Tartare de saumon', 'Tartare de bœuf', 'Steak frites',
            'Tacos', 'Burritos', 'Quesadillas', 'Guacamole', 'Chili con Carne',
            'Falafel', 'Shawarma', 'Kebab', 'Poulet grillé', 'Couscous',
            'Moussaka', 'Ceviche', 'Pâté en croûte', 'Ragoût de veau', 'Steak Tartare',
            'Crêpes Suzette', 'Crêpes Nutella', 'Gaufres', 'Tarte Tatin', 'Tiramisu',
            'Panna Cotta', 'Cheesecake', 'Fondant au chocolat', 'Macarons', 'Éclairs au chocolat',
            'Crème brûlée', 'Mousse au chocolat', 'Canelé', 'Madeleine', 'Churros'
        ];        

        return [
            'name' => fake()->randomElement($itemNames),
            'category_id' => random_int(1, 80),
            'cost' => random_int(1, 50), 
            'price' => random_int(1, 25), 
        ];
    }
}
