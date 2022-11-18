<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_user_can_create_user()
    {
        $username = "emretest";
        $password = "emretest";
        
        $response = $this->post('/register', [
            'username' => $username,
            'password' => $password
        ]);
        $response->assertStatus(200);

        $createdUser = User::where("username", $username)->first();
        $createdUser->delete();
        $this->assertEquals($createdUser->username, $username);
        $this->assertEquals($createdUser->password, $password);
    }
}
