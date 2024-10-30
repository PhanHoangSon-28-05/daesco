<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MailConfigController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'mail-configs');
    }

    public function index()
    {
        return view('admins.mail-configs.index');
    }
}
