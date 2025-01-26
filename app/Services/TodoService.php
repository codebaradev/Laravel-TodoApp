<?php

namespace App\Services;

use App\Models\Todo;

interface TodoService 
{
    public function create(array $data): Todo;
    public function read(int $id): ?Todo;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function getAllByUser(int $user_id): array;
}