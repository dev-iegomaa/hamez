<?php

namespace App\Http\Interfaces\Admin;

interface ContactInterface
{
    public function index();
    public function delete($id);

    public function edit($id);
    public function update($request);
}
