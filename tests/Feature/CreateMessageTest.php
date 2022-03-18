<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateMessageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = new User([
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'color' => "test"
        ]);
        $user->save();

        auth()->login($user);

        $response = $this
            ->from('/chatroom')
            ->followingRedirects()
            ->actingAs($user)
            ->post('sendmessage', [
                'content' => 'Hello World!',
            ]);

        $this->assertDatabaseHas('messages', [
            'content' => 'Hello World!'
        ]);
    }
}
