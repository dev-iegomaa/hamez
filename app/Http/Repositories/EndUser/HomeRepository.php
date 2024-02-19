<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Slider;

class HomeRepository implements HomeInterface
{

    public function index()
    {
        $sliders = Slider::select(['title', 'image'])->get();
        $about = Faq::select(['question', 'answer'])->first();
        $categories = Category::select(['title', 'id', 'image', 'icon'])->get();
        return view('endUser.pages.index', compact('sliders', 'about', 'categories'));
    }
}
