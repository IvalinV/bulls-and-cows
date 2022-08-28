<?php

namespace Database\Seeders;

use App\Models\Score;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->has(Score::factory()->times(5))->times(1)->create();
    }
}
