<?php

namespace App\Services;

use App\Models\User;

interface UserService 
{
    public function register(array $request): User;
    public function login(array $request): ?User;
}