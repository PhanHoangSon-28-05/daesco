<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SystemController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'systems');
    }

    public function index(){
        return view('admins.systems.index');
    }
}
