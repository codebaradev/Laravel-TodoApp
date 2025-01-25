<?php

namespace Tests\Feature\Controller;

use App\Http\Middleware\VerifyCsrfToken;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function testRegister()
    {
        $request = $this->withoutMiddleware([VerifyCsrfToken::class])->post('/auth/register', [
            'username' => 'Codebara',
            'email' => 'codebara@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);
        
        $request->assertRedirect('/dashboard');
        $request->assertSessionHas('user_id');
    }

    public function testLogin()
    {
        $this->seed([UserSeeder::class]);

        $request = $this->withoutMiddleware([VerifyCsrfToken::class])->post('/auth/login', [
            'username_or_email' => 'baracode',
            'password' => 'baracode123',
        ]);
        
        $request->assertRedirect('/dashboard');
        $request->assertSessionHas('user_id');
    }
}
