<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ticker',
        'country',
        'sector',
        'industry',
        'market_cap',
        'average_analyst_rating',
        'regular_market_price',
        'one_year_target',
        'one_year_lowest',
        'one_year_highest',
        'volatility',
        'EPS'
    ];

    // // Added this to create filtering for our search bar on the page. 
    // public function scopeFilter($query, array $filters){

    //     if ($filters['industry'] ?? false) // this is called a "null coalescing operator"
    //     {
    //         // lets prepare our SQL query
    //         $query->where('industry', 'like', '%' . $filters['industry'] . '%');

    //     }
            
    //     if($filters['search'] ?? false) {
    //         // Make an array of keyword to search for
    //         $keywords = explode(' ', $filters['search']);
    //         // dd($keyword); Check to see if the code is working correcting, like console.log()

    //         foreach($keywords as $keyword) {
    //         $query->where('tags', 'like', '%' . $keyword . '%');
    //         }
    //     }}
}
