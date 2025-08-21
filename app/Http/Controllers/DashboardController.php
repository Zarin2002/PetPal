<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Include 'auth.' prefix for the 'auth/dashboard.blade.php' path
        return view('auth.dashboard');
    }
}

