<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AuthInterface;
use App\Http\Requests\Admin\Auth\LoginRequest;

class AuthController extends Controller
{
    private $interface;
    public function __construct(AuthInterface $interface)
    {
        $this->interface = $interface;
    }

    public function index()
    {
        return $this->interface->index();
    }

    public function login(LoginRequest $request)
    {
        return $this->interface->login($request);
    }

    public function logout()
    {
        return $this->interface->logout();
    }
}
