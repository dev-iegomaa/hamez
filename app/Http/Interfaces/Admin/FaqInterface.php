<?php

namespace App\Http\Interfaces\Admin;

interface FaqInterface
{
    public function index();
    public function create();
    public function store($request);
    public function delete($id);
    public function edit($id);
    public function update($request);
}
