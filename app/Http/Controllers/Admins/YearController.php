<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class YearController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'years');
    }

    public function index()
    {
        return view('admins.years.index');
    }
}
