<?php

namespace Tests\Feature\Services;

use App\Services\UserService;
use Database\Seeders\UserSeeder;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = App::make(UserService::class);
    }

    public function testRegister()
    {
        $request = [
            'username' => 'Codebara',
            'email' => 'Codebara@gmail.com',
            'password' => '123',
        ];

        $user = $this->userService->register($request);

        $this->assertEquals($request['username'], $user->username);
    }

    public function testRegisterFailder()
    {
        $this->seed([UserSeeder::class]);

        $this->expectException(QueryException::class);
        
        $request = [
            'username' => 'codebara',
            'email' => 'codebara@gmail.com',
            'password' => 'codebara123',
        ];

        $user = $this->userService->register($request);

        $this->assertEquals($request['username'], $user->username);
    }

    public function testLoginEmail()
    {
        $this->seed([UserSeeder::class]);

        $request = [
            'username_or_email' => 'codebara@gmail.com',
            'password' => 'codebara123'
        ];
        
        $result = $this->userService->login($request);

        $this->assertNotNull($result);
    }

    public function testLoginUsername()
    {
        $this->seed([UserSeeder::class]);

        $request = [
            'username_or_email' => 'baracode',
            'password' => 'baracode123'
        ];
        
        $result = $this->userService->login($request);

        $this->assertNotNull($result);
    }

    public function testLoginInvalid()
    {
        $this->seed([UserSeeder::class]);

        $request = [
            'username_or_email' => 'codebara',
            'password' => 'testing'
        ];
        
        $result = $this->userService->login($request);

        $this->assertNull($result);
    }
}
