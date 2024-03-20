<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    private $menu;

    public function __construct()
    {
       /*  $this->middleware('auth'); */
        $this->menu = 'dashboard';  
    }
    public function index(){
        return view('dashboard');
    }
}
