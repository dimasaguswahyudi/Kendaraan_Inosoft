<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function login()
    {
        $user = User::first();
        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $this->me($response->original["token"]);
        $this->logout($response->original["token"]);
    }
    public function me($token)
    {
        $response = $this->post('api/auth/me', [
            'HTTP_Authorization' => 'Bearer ' . $token
        ]);
    }
    public function logout($token)
    {
        $response = $this->post('api/auth/logout', [
            'HTTP_Authorization' => 'Bearer ' . $token
        ]);
        $response->assertStatus(200);
    }

    public function test_example()
    {
        $this->login();
    }
}
