<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StafSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
         'name' => 'staf',
         'email' => 'staf@gmail.com',
         'password' => Hash::make('staf123'),
         'role' => 'staf',
        ]);
    }
}
