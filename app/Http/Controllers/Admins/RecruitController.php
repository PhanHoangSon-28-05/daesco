<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RecruitController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'recruits');
    }

    public function index()
    {
        return view('admins.recruits.index');
    }
}
