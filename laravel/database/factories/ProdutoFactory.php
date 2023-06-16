<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'Boné', 'Chapeú', 'Camiseta', 'Bermuda', 'Calça', 'Chinelo', 'Patins', 'Biblioteca', 'Arroz', 'Feijão', 'Cadeira'
        ];
        return [
            'name' => $this->faker->randomElement($names),
            'price' =>  $this->faker->randomFloat(2, 1, 5000),
            'quantity' =>  $this->faker->numberBetween(1,10000),
        ];
    }
}
