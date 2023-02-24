<?php

namespace Database\Seeders;

use App\Models\manegar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManegarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        manegar::factory(10)->create();
    }
}
