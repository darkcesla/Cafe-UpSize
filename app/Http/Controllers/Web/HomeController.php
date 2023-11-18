<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.web.dashboard.home');
    }

    public function shop()
    {
        return view('pages.web.daftarmenu.menu');
    }
}