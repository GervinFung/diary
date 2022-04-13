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
            'date' => $this->faker
                ->dateTimeBetween('-10 years', 'now')
                ->format('Y-m-d'),
            'content' => '<p>' . $this->faker->text(500) . '</p>',
        ];
    }
}
