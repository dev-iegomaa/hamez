<?php

namespace App\Http\Interfaces\EndUser;

interface BookInterface
{
    public function index();

    public function store($request);

    public function services($id);
}
