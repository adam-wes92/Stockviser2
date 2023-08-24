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
        'inductry',
        'market_cap',
        'average_analyst_rating',
        'regular_market_price',
        'one_year_target',
        'one_year_lowest',
        'one_year_highest',
        'volatility',
        'EPS'
    ];


}
