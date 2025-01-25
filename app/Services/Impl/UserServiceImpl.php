<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserServiceImpl implements UserService
{
    public function register(array $request): User
    {
        // $user = new User([
        //     'username' => $request['username'],
        //     'email' => $request['email'],
        //     'password' => $request['password'],
        // ]);
        // $user->save();

        return User::query()->create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    }

    public function login(array $request): ?User
    {
        // $user = User::query()->where(function (Builder $builder) use ($request) {
        //     $builder->where('username', '=', $request['username_or_email']);
        //     $builder->orWhere('email', '=', $request['username_or_email']);
        // })->where('password', '=', $request['password'])->first();
        
        // return $user ? true : false;

        if (Auth::attempt(['email' => $request['username_or_email'], 'password' => $request['password']]) || 
            Auth::attempt(['username' => $request['username_or_email'], 'password' => $request['password']])) {
        
            return Auth::user();
        } 
        
        return null;
    }
}