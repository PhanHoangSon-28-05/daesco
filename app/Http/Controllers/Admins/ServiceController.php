<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'services');
    }

    public function index()
    {
        return view('admins.services.index');
    }
}
