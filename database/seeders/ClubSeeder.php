<?php

namespace Database\Seeders;

use App\Models\club;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        club::create([
            'gmail'=>'omar123@gmail.com',
            'password'=>Hash::make('12345')
        ]);

        
    }
}
