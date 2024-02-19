<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ServicesTermsInterface;
use App\Models\ServiceTerm;

class ServicesTermsRepository implements ServicesTermsInterface
{

    public function index()
    {
        $services_terms = ServiceTerm::select(['service'])->get();
        return view('endUser.pages.terms', compact('services_terms'));
    }
}
