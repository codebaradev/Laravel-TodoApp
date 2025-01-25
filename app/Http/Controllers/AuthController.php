<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
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

    public function postRegister(RegisterRequest $request): Response
    {
        $validatedData = $request->validated();

        return response(json_encode($validatedData, JSON_PRETTY_PRINT));
    }

    public function login(): Response
    {
        return response()->view('auth.login-register', [
            'title' => 'Login',
            'isRegister' => false
        ]);
    }

    public function postLogin(LoginRequest $request): Response
    {
        $validatedData = $request->validated();

        return response(json_encode($validatedData, JSON_PRETTY_PRINT));
    }

    public function logout()
    {
        
    }
}
