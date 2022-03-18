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

    public function test_view_chat_form()
    {
        $user = new User([
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'color' => "test"
        ]);
        $user->save();

        auth()->login($user);

        $response = $this->get('chatroom');
        $response->assertStatus(200);
    }

    public function test_create_message()
    {
        $user = new User([
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'color' => "test"
        ]);
        $user->save();

        auth()->login($user);

        $this
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
