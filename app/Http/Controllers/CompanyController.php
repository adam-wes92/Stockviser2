<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //This function controlls single company fetched data
    // Show all listings
    public function index() {
        return view('companies.index', [
            // We need to call filter() before get() to add extra condition to the query
            // when the query is ready, get() will trigger the call to the DB
            'companies' => Company::latest()->filter(request(['search']))->simplepaginate(4),
        ]); 
    }
    // // Show a single listing
    // public function show(Company $company) {
    //     return  view('companies.show', [
    //         'company' => $company 

    //     ]);
    // }

    // Added this to create filtering for our search bar on the page. 
    public function scopeFilter($query, array $filters){

        
        if($filters['search'] ?? false) {
            // Make an array of keyword to search for
            $keywords = explode(' ', $filters['search']);
            // dd($keyword); Check to see if the code is working correcting, like console.log()

            foreach($keywords as $keyword) {
            $query->where('tags', 'like', '%' . $keyword . '%');
            }
        }}

        // relationship to User model
        public function user() {
            // Now for Laravel, our Listing belongs to a sinlge User
            return $this->belongsTo(User::class, 'user_id');
        }

}
