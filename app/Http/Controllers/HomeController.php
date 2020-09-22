<?php

namespace App\Http\Controllers;

use App\Models\DesignDep;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::first();

        $all_departments = DesignDep::where('parent', null)->get();

        return view('website.index', compact('settings', 'all_departments'));
    }
}
