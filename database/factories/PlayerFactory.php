<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>$this->faker->name(),
            // 'id_number'=>$this->faker->id_number(),
            'phone_number' => $this->faker->phoneNumber(),
            'image' => $this->faker->imageUrl(),
            

        ];
    }
}
