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
    public function test_create_user()
    {
        $user = new User([
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'color' => "test"
        ]);
        $user->save();

        $this->assertDatabaseHas('users', [
            'username' => 'test',
            'email' => 'test@test.com',
            'color' => 'test'
        ]);
    }
}
