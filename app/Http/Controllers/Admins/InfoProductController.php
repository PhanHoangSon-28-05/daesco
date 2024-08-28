<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InfoProductController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'info-products');
    }

    public function index()
    {
        return view('admins.infor_products.index');
    }
}
