<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'user_id' => $this->faker->randomElement([1,2,3]),
            'amount' => $this->faker->numberBetween('1000','2000'),
            'type' => $this->faker->randomElement(['Income','Expense']),
        ];
    }
}
