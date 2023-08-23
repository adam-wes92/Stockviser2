<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'first_name' => 'Banana',
            'last_name' => 'Man', 
            'address' => '456 Somewhere Ave.', 
            'city' => 'Luxembourg City', 
            'country' => 'Luxembourg',
            'zip_code' => '2222', 
            'birth_date' => '2022-08-27',
            'phone_number' => '123-123-123',
            'email' => 'banana.man@gmail.com',
            'password' => 'Pa$$word123?'
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
