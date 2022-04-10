<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'journal_id' => rand(1, 50),
            'content' => '<p>' . $this->faker->text(500) . '</p>',
            'title' => rtrim($this->faker->text(10), '.'),
        ];
    }
}
