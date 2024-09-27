<?php

namespace App\Http\Controllers\Admins;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'service-types');
    }

    public function index()
    {
        return view('admins.service-types.index');
    }
}
