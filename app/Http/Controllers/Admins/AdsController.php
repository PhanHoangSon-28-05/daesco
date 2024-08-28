<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdsController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'ads');
    }

    public function index()
    {
        return view('admins.ads.index');
    }
}
