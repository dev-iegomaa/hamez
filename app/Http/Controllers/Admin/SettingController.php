<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\SettingInterface;
use App\Http\Requests\Admin\Setting\SettingRequest;

class SettingController extends Controller
{
    private $interface;
    public function __construct(SettingInterface $interface)
    {
        $this->interface = $interface;
    }

    public function index()
    {
        return $this->interface->index();
    }

    public function store(SettingRequest $request)
    {
        return $this->interface->store($request);
    }
}
