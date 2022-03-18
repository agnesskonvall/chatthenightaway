<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSee('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        // Once tested, the User already exists in database.
        // Only use code below when in need to registering a new user
        // $user = new User([
        //     'username' => 'test',
        //     'email' => 'test@test.com',
        //     'password' => Hash::make('123'),
        //     'color' => "test"
        // ]);
        // $user->save();

        $response = $this->followingRedirects()->post('login', [
            'email' => 'test@test.com',
            'password' => 'test',
        ]);

        $response->assertStatus(200);
    }

    public function test_login_user_without_password()
    {
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
            ]);

        $response->assertSeeText('Whoops! Please try again!');
    }
}
