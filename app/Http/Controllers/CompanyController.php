<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //This function controlls single company fetched data
    

    // We need to call filter() before get() to add extra condition to the query
    // when the query is ready, get() will trigger the call to the DB
    // 'companies' => Company::latest()->filter(request(['tag', 'search']))->simplepaginate(4),

    
    // Show a single listing
    // public function show(Company $company) {
    //     return  view('companies.show', [
    //         'company' => $company 

    //     ]);

    // }
}
