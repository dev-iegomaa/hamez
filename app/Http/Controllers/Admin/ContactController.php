<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ContactInterface;
use App\Http\Requests\Admin\Contact\UpdateContactRequest;

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

    public function delete($id)
    {
        return $this->interface->delete($id);
    }

    public function edit($id)
    {
        return $this->interface->edit($id);
    }

    public function update(UpdateContactRequest $request)
    {
        return $this->interface->update($request);
    }
}
