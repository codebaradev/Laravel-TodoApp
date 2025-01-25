<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

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

    public function postRegister(RegisterRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $user = $this->userService->register($validatedData);

        $request->session()->put('user_id', $user->id);

        return response()->redirectTo('/dashboard');
    }

    public function login(): Response
    {
        return response()->view('auth.login-register', [
            'title' => 'Login',
            'isRegister' => false
        ]);
    }

    public function postLogin(LoginRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $user = $this->userService->login($validatedData);

        if ($user) {
            $request->session()->put('user_id', $user->id);
            return response()->redirectTo('/dashboard');
        } else {
            throw ValidationException::withMessages([
                'username_or_email_or_password' => ['Username or email or password is incorrect'],
            ]);
        }

    }

    public function logout(Request $request)
    {

        // Forget the user_id from the session
        $request->session()->forget('user_id');
        
        // Invalidate the session - This ensures that the session data is cleared and the session is marked as invalid.
        $request->session()->invalidate();
        
        // Regenerate the session ID - This helps prevent session fixation attacks by generating a new session ID.
        $request->session()->regenerateToken();
        
        return response()->redirectTo('/');
    }
}
