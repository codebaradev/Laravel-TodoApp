<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private TodoService $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index(Request $request) 
    {
        return response()->view('home.index', [
            'title' => 'TodoApp'
        ]);
    }

    public function dashboard(Request $request)
    {
        $todos = $this->todoService->getAllByUser($request->session()->get('user_id'));
        return response()->view('home.dashboard', [
            'title' => 'Dashboard',
            'todos' => $todos
        ]);
    }
}
