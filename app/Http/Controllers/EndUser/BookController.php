<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\BookInterface;
use App\Http\Requests\EndUser\BookRequest;

class BookController extends Controller
{
    private $interface;
    public function __construct(BookInterface $interface)
    {
        return $this->interface = $interface;
    }

    public function index()
    {
        return $this->interface->index();
    }

    public function store(BookRequest $request)
    {
        return $this->interface->store($request);
    }

    public function services($id)
    {
        return $this->interface->services($id);
    }
}
