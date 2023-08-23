<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies'; // Specify the table name if it's different from the default
    protected $fillable = ['name', 'ticker']; // Fillable columns

}
