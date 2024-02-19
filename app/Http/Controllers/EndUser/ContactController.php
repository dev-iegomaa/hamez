<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ContactInterface;
use App\Http\Requests\EndUser\ContactRequest;

class ContactController extends Controller
{
    private $interface;
    public function __construct(ContactInterface $interface)
    {
        $this->interface = $interface;
    }

    public function index()
    {
        return $this->interface->index();
    }

    public function store(ContactRequest $request)
    {
        return $this->interface->store($request);
    }
}
