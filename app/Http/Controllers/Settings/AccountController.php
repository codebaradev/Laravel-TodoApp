<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->view('settings.account.index', [
            'title' => 'Settings',
            'setting' => 'Account',
            'user' => $this->userService->getCurrentUser()
        ]);
    }

    public function postIndex(UpdateUserRequest $request)
    {
        $data = $request->validated();
        
        $this->userService->update($data);

        return response()->redirectTo('/settings/account');
    }

    public function updatePassword()
    {
        return response()->view('settings.account.change-password', [
            'title' => 'Settings',
            'setting' => 'Account',
        ]);
    }
    
    public function postUpdatePassword(UpdatePasswordUserRequest $request)
    {
        $data = $request->validated();

        $this->userService->updatePassword($data);

        return response()->redirectTo('/settings/account');
    }
}
