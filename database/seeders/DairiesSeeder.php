<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diary;

class DairiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diary::factory()->times(500)->create();
    }
}
