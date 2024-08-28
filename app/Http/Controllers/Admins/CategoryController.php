<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        Session::put('menu', 'categories');
    }

    public function index()
    {
        return view('admins.category.index');
    }
}
