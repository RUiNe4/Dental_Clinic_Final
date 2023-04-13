<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
					'patient_id' => fake ()->numberBetween (1,10),
					'patient_name' => fake()->name(),
					'amount' => fake()->numberBetween (10, 999),
					'doctor' => 'Sunchhay Khoun',
					'date' => fake()->date(),
        ];
    }
}
