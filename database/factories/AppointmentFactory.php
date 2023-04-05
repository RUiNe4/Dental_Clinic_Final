<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'phoneNum' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'email' => 'sunchhay395@gmail.com',
            'birthday' => fake()->date(),
            'appointmentDate' => fake()->date(),
            'appointedDoctor' => 'Sunchhay Khoun',
            'status' => 'Approve',
						'paid' => false,
//						'treatment_id' => fake()->numberBetween (1, 5),
            'message' => fake()->text(),
        ];
    }
}
