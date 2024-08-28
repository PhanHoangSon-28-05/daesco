<?php

namespace App\Http\Controllers\Admins;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HeaderController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'headers');
    }

    public function index()
    {
        return view('admins.header.index');
    }
}
