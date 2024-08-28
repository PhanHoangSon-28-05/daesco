<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DevelopmentController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'developments');
    }

    public function index()
    {
        return view('admins.developments.index');
    }
}
