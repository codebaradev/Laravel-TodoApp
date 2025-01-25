<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        return response()->view('home.index', [
            'title' => 'TodoApp'
        ]);
    }

    public function dashboard(Request $request)
    {
        return response()->view('home.dashboard', [
            'title' => 'Dashboard',
            'userId' => $request->session()->get('user_id')
        ]);
    }
}
