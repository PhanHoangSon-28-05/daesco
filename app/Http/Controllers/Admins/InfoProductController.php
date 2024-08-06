<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoProductController extends Controller
{
    public function index()
    {
        return view('admins.infor_products.index');
    }
}
