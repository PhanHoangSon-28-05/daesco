<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'sliders');
    }

    public function index()
    {
        return view('admins.sliders.index');
    }
}
