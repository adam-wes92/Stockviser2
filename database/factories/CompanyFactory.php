<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { $number=$this->faker->numberBetween(-10,10);
        $word=$this->faker->word;
        $rating="{$number}-{$word}";
        return [
            'name'=>$this->faker->word(2, true),
            'ticker'=>$this->faker->lexify('????'),
            'country'=>$this->faker->word(1, true),
            'sector'=>$this->faker->word(2, true),
            'inductry'=>$this->faker->word(3, true),
            'market_cap'=>$this->faker->randomFloat(2, 1, 10000000000000),
           
            'average_analyst_rating'=>$rating,
            'regular_market_price'=>$this->faker->numberBetween(1,1000),            
            'one_year_target'=>$this->faker->numberBetween(1,1000),
            'one_year_lowest'=>$this->faker->numberBetween(1,1000),
            'one_year_highest'=>$this->faker->numberBetween(1,1000),
            'volatility'=>$this->faker->randomFloat(2, -5, 5), //beta
            'EPS'=>$this->faker->randomFloat(2, -5, 5),
        ];
    }
}
