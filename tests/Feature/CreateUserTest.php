<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class CreateUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_view_signup()
    {
        $response = $this->get('signup');
        $response->assertStatus(200);
    }
    public function test_create_user()
    {
        $this
            ->from('/')
            ->followingRedirects()
            ->post('register', [
                'username' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('test'),
                'color' => "test"
            ]);

        $this->assertDatabaseHas('users', [
            'username' => 'test',
            'email' => 'test@test.com',
            'color' => 'test'
        ]);
    }
    // public function test_redirects_to_view_chatroom()
    // {
    //     $user = new User([
    //         'username' => 'test',
    //         'email' => 'test@test.com',
    //         'password' => Hash::make('test'),
    //         'color' => "test"
    //     ]);
    //     $user->save();

    //     auth()->login($user);
    // }
}
