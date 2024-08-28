<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrganizationalController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'organizationals');
    }

    public function index()
    {
        return view('admins.organizational.index');
    }
}
