<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ServicesTermsInterface;

class ServicesTermsController extends Controller
{
    private $interface;
    public function __construct(ServicesTermsInterface $interface)
    {
        $this->interface = $interface;
    }

    public function index()
    {
        return $this->interface->index();
    }
}
