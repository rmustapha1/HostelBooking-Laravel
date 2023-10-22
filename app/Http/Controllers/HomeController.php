<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {
        return view('home');
    }
}