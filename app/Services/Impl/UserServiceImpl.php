<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserServiceImpl implements UserService
{
    public function register(array $data): User
    {
        // $user = new User([
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'password' => $data['password'],
        // ]);
        // $user->save();

        $user = User::query()->create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user); // to authenticate the new user

        return $user;
    }

    public function login(array $data): ?User
    {
        // $user = User::query()->where(function (Builder $builder) use ($data) {
        //     $builder->where('username', '=', $data['username_or_email']);
        //     $builder->orWhere('email', '=', $data['username_or_email']);
        // })->where('password', '=', $data['password'])->first();
        
        // return $user ? true : false;

        if (Auth::attempt(['email' => $data['username_or_email'], 'password' => $data['password']]) || 
            Auth::attempt(['username' => $data['username_or_email'], 'password' => $data['password']])) {
        
            return Auth::user(); // return the authenticated user
        } 
        
        return null;
    }

    public function getCurrentUser(): ?User
    {
        return Auth::user();
    }

    public function update(array $data): bool
    {
        $user = Auth::user();

        if ($user) {
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->save();
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword(array $data): bool
    {
        $user = Auth::user();

        if ($user) {
            $user->password = bcrypt($data['password']);
            $user->save();
            return true;
        } else {
            return false;
        }
    }
}