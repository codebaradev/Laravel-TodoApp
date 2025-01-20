<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Database\Seeders\TodoSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Symfony\Component\VarDumper\VarDumper;
use Tests\TestCase;

class TodoTest extends TestCase
{
    public function testTodo()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);

        $user = User::query()->first();
        $todos = $user->todos;

        $this->logger->debug("User : " . json_encode($user));

        foreach ($todos as $todo) {
            $this->assertEquals($user->id, $todo->user_id);
            $this->assertEquals($user->id, $todo->user->id);
            $this->logger->debug("Todo : " . json_encode($todo));
        }
    }
}
