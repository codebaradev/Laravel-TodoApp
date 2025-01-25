<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(): Response
    {
        return response()->view('auth.login-register', [
            'title' => 'Sign Up',
            'isRegister' => true
        ]);
    }

    public function postRegister(Request $request)
    {
        
    }

    public function login()
    {
        return response()->view('auth.login-register', [
            'title' => 'Login',
            'isRegister' => false
        ]);
    }

    public function postLogin(Request $request)
    {
        return 'post login';
    }

    public function logout()
    {
        
    }
}
