<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'pages');
    }

    public function index()
    {
        return view('admins.pages.index');
    }
}
