<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'infos');
    }

    public function index()
    {
        return view('admins.infos.index');
    }
}
