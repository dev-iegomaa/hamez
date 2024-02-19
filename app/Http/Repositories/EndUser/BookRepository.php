<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\BookInterface;
use App\Models\Book;
use App\Models\Category;
use App\Models\Service;

class BookRepository implements BookInterface
{

    public function index()
    {
        $categories = Category::select(['title', 'id'])->get();
        return view('endUser.pages.book', compact('categories'));
    }

    public function store($request)
    {
        Book::create([
            'date' => $request->date,
            'place' => $request->place,
            'category_id' => $request->category_id,
            'service_id' => $request->service_id,
            'available_time' => $request->available_time,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'subject' => $request->subject,
            'email' => $request->email,
            'birth_date' => $request->birth_date
        ]);
        toast('Booked Your Request Successfully', 'success');
        return redirect(route('endUser.service'));
    }

    public function services($id)
    {
        $services = Service::select(['title', 'id'])->where('category_id', $id)->get();
        return response()->json($services);
    }
}
