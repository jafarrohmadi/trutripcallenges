<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $loginData = ['email'    => 'sample@test.com',
                      'password' => 'sample123',
        ];

        $this->json('POST', 'api/auth/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'token',
                ],
            ]);

        $this->assertAuthenticated();
    }

    public function testFailedLogin()
    {
        User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $loginData = ['email'    => 'sample@test.com',
                      'password' => 'sample1234',
        ];

        $this->json('POST', 'api/auth/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
    }

    public function testSuccessfulGetProfile()
    {
        $user = User::factory()->create([
            'email'    => 'sample@test.com',
            'password' => bcrypt('sample123'),
        ]);

        $this->actingAs($user, 'api');

        $this->json('Get', 'api/auth/profile', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'email'
                ],
            ]);

        $this->assertAuthenticated();
    }

    public function testFailedGetProfile()
    {
        $this->testFailedLogin();
        $this->json('Get', 'api/auth/profile', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data'
            ]);
    }

}
