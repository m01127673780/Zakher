<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WelcomeController extends Controller
{

    
    // Index
    public function index()
    {

        return view('dashboard.welcome');
    }
    // End of Index
}
