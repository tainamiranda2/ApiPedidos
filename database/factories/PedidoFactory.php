<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->name,
            //testo curto
            'descricao'=>$this->faker->sentence(),
            'status'=>$this->faker->randomElement(['ativo', 'inativo', 'pendente']),
            'cliente_id' => strval($this->faker->randomNumber(1)),

        ];
    }
}
