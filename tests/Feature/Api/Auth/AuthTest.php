<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\TestUtils;

class AuthTest extends TestCase
{
    use WithFaker;

    public function testRegister()
    {
        $user = User::factory()->make(['password' => $this->faker->password]);
        $response = $this->postJson('/api/register', [
            'name' => $user->name,
            'email' => $user->email,
            "password" => $user->password,
            "password_confirmation" => $user->password,
        ]);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }

    public function testLogin(){
        $pass = $this->faker->password;
        $user = User::factory()->create(['password' => \Hash::make($pass)]);
        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            "password" => $pass,
        ]);
        $response->assertStatus(200);
    }

    public function testTokenUnAuth(){
        $response = $this->getJson('/api/user');
        $response->assertStatus(403);
    }

    public function testTokenAuth(){

        $response = $this->getJson('/api/user', TestUtils::getAuthHeader());
        $response->assertStatus(200);
    }

    public function testLogout(){
        $user = User::factory()->create();
        $user = User::where('email', $user->email)->first();

        $response = $this->deleteJson('/api/logout', [], TestUtils::getAuthHeader($user));
        $response->assertStatus(204);

        $response2 = $this->getJson('/api/user', [], TestUtils::getAuthHeader($user));

        $response2->assertStatus(403);

    }

    public function testDelete(){
        $user = User::factory()->create();
        $user = User::where('email', $user->email)->first();
        $token = explode('|', $user->createToken('Testing')->plainTextToken);
        $response = $this->deleteJson('/api/user', [], TestUtils::getAuthHeader($user));
        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', [
            'email' => $user->email,
        ]);
    }

}
