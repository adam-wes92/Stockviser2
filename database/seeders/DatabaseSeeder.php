<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

use App\Models\Company;
use App\Models\Portfolio;


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
            'zip' => '2222', 
            'birth_date' => '2022-08-27',
            'phone_number' => '123-123-123',
            'email' => 'banana.man@gmail.com',
            'password' => 'Pa$$word123?'
        ]);

        $companies=Company::factory(20)->create();
        foreach($companies as $company){
            $user_id=1;
            Portfolio::factory(1)->create([
                'user_id'=>$user_id,
                'company_id'=>$company->id
            ]);
        }

    }
}
