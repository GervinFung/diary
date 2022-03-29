<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $year = rand(2010, 2022);
        $month = rand(1, 12);
        $daylimit = 31;
        if ($month == 4 or $month == 6 or $month == 9 or $month == 11) {
            $daylimit = 30;
        } elseif ($month == 2) {
            if ($year % 4 == 0) {
                $daylimit = 29;
            } else {
                $daylimit = 28;
            }
        } 
        $day = rand(1,$daylimit);

        return [
            'journal_id' => rand(1,50),
            'date' => Carbon::parse($year.'-'.$month.'-'.$day),
            'content' => '<p>'.$this->faker->text(500).'</p>'
        ];
    }
}
