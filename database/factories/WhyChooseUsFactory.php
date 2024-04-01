<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\whychooseus>
 */
class WhyChooseUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon'=>'fa-solid fa-paperclip',
            'title'=>fake()->sentence(),
            'description'=>fake()->paragraph(2),
            'status'=>fake()->boolean()
        ];
    }
}
