<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ServiceInterface;
use App\Models\Category;

class ServiceRepository implements ServiceInterface
{

    public function index()
    {
        $categories = Category::select(['title', 'id', 'image', 'icon'])->get();
        return view('endUser.pages.service', compact('categories'));
    }
}
