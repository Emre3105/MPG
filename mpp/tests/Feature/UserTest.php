<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        assert(true);
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }

    public function test_user_can_create_user()
    {
        $username = "emretest";
        $password = "emretest";
        $temp = User::where("username", $username);
        if ($temp) {
            User::where("username", $username)->delete();
        }
        $response = $this->post('/register', [
            'username' => $username,
            'password' => $password
        ]);
        if ($temp) {
            User::where("username", $username)->delete();
        }
        dd($response->data);

        $response->assertStatus(200);
    }
}
