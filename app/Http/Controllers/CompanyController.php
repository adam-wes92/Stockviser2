<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // relationship to User model
    public function user() {
        // Now for Laravel, our Listing belongs to a sinlge User
        return $this->belongsTo(User::class, 'user_id');
    }

}
