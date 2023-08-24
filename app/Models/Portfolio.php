<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',
            'company_id',
            'shares_qty',
            'purchase_cost',
            'current_cost',
            'gain',
            'performance_percentage',
            'last_purchase_date'        
    ];

}
