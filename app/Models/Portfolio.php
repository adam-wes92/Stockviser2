<?php

namespace App\Models;

use App\Models\Companies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'quantity', 'current_cost'];


    public function company()
    {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
