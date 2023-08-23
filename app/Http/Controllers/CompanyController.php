<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //This function controlls single company fetched data
    public function showSingle()
    {
        return view('companies.company-card');
    }
}
