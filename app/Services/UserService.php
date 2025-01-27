<?php

namespace App\Services;

use App\Models\User;

interface UserService 
{
    public function register(array $data): User;
    public function login(array $data): ?User;
    public function getCurrentUser(): ?User;
    public function update(array $data): bool;
    public function updatePassword(array $data): bool;
}