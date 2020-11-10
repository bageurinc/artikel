<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rewardsController extends Controller
{
    public function index()
    {
        return view('rewards');
    }
}
