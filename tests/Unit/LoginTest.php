<?php

namespace Tests\Unit;

use App\User;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'mot-de-passe'),
        ]);

        $response = $this->prophesize('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAttributeLessThanOrEqual($user);
    }
}
