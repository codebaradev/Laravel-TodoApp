<?php

namespace Tests\Feature\Services;

use App\Models\Todo;
use App\Models\User;
use App\Services\TodoService;
use Database\Seeders\TodoSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class TodoServiceTest extends TestCase
{
    private TodoService $todoService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->todoService = App::make(TodoService::class);
    }
    
    public function testCreate()
    {
        $this->seed([UserSeeder::class]);

        $data = [
            'user_id' => User::query()->first()->id,
            'todo_title' => 'testing',
        ];

        $todo = $this->todoService->create($data);

        $this->assertEquals($data['user_id'], $todo->user_id);
        $this->assertEquals($data['todo_title'], $todo->title);
    }

    public function testRead()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);

        $todo = $this->todoService->read(Todo::query()->first()->id);

        $this->assertNotNull($todo);
        $this->assertEquals("todo 0", $todo->title);
    }

    public function testReadFailed()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);

        $todo = $this->todoService->read(-1);

        $this->assertNull($todo);
    }

    public function testUdpate() 
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);

        $oldTodo = Todo::query()->first();

        $data = [
            'todo_title' => 'Todo 0 edited',
            'todo_description' => 'Todo 0 description edited',
            'todo_is_completed' => true
        ]; 
        
        $result = $this->todoService->update($oldTodo->id, $data);

        $updatedTodo = Todo::query()->first();

        $this->assertTrue($result);
        $this->assertEquals($data['todo_title'], $updatedTodo->title);
        $this->assertEquals($data['todo_description'], $updatedTodo->description);
        $this->assertEquals($data['todo_is_completed'], $updatedTodo->is_completed);
    }
    
    public function testDelete()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);
        
        $todo = Todo::query()->first();
        
        $result = $this->todoService->delete($todo->id);

        $this->assertTrue($result);

        $result = $this->todoService->read($todo->id);

        $this->assertNull($result);
    }

    public function testGetAllByUser()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);

        $user = User::query()->first();

        $todos = $this->todoService->getAllByUser($user->id);
        
        foreach ($todos as $todo) {
            $this->assertEquals($user->id, $todo->user_id);
        }
    }

}
