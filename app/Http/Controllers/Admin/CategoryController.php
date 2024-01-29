<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Requests\Admin\Category\CategoryRequest;

class CategoryController extends Controller
{
    private $interface;
    public function __construct(CategoryInterface $interface)
    {
        $this->interface = $interface;
    }

    public function index()
    {
        return $this->interface->index();
    }

    public function create()
    {
        return $this->interface->create();
    }

    public function store(CategoryRequest $request)
    {
        return $this->interface->store($request);
    }

    public function delete($id)
    {
        return $this->interface->delete($id);
    }

    public function edit($id)
    {
        return $this->interface->edit($id);
    }

    public function update(CategoryRequest $request)
    {
        return $this->interface->update($request);
    }
}
