<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminBookInterface;
use App\Models\Book;

class AdminBookRepository implements AdminBookInterface
{

    public function index()
    {
        $books = Book::paginate(10);
        return view('admin.pages.book.index', compact('books'));
    }
}
