<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminHomeInterface;

class AdminHomeController extends Controller
{
    private $interface;
    public function __construct(AdminHomeInterface $interface)
    {
        $this->interface = $interface;
    }

    public function index()
    {
        return $this->interface->index();
    }

    public function pageNotFound()
    {
        return $this->interface->pageNotFound();
    }
}
