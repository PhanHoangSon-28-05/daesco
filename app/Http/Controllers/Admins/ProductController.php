<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'products');
    }

    public function index()
    {
        return view('admins.products.index');
    }
}
