<?php

namespace App\Services\Impl;

use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Support\Facades\Auth;

class TodoServiceImpl implements TodoService
{
    public function create(array $data): Todo 
    {
        $todo = Todo::query()->create([
            'user_id' => $data['user_id'],
            'title' => $data['todo_title'],
        ]);

        return $todo;
    }

    public function read(int $id): ?Todo
    {
        return Todo::query()->find($id);
    }

    public function update(int $id, array $data): bool
    {
        $todo = Todo::query()->find($id);

        if (!$todo) {
            return false;
        }

        $todo->update([
            'title' => $data['todo_title'],
            'description' => $data['todo_description'],
            'is_completed' => $data['todo_is_completed']
        ]);

        return true;
    }

    public function delete(int $id): bool
    {
        return Todo::destroy($id) > 0;
    }

    public function getAllByUser(int $user_id): array
    {
        return Todo::query()->where('user_id', '=', $user_id)->get()->all();
    }
}