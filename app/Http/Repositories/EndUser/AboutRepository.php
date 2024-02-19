<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\AboutInterface;
use App\Models\Faq;

class AboutRepository implements AboutInterface
{

    public function index()
    {
        $faqs = Faq::select(['question', 'answer'])->get();
        return view('endUser.pages.about', compact('faqs'));
    }
}
