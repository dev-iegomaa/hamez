<?php

namespace App\Http\Interfaces\EndUser;

interface ContactInterface
{
    public function index();
    public function store($request);
}
