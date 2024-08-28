<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FooterController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'footers');
    }

    public function index()
    {
        return view('admins.footer.index');
    }
}
