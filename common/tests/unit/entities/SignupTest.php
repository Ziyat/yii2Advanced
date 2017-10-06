<?php
namespace common\tests\unit\entities;

use Codeception\Test\Unit;
use common\entities\User;

class SignupTest extends Unit
{
    public function testSuccess()
    {
        $user = new User(
            $username = 'username',
            $email = 'email@email.com',
            $password = 'password'
        );

        $this->assertEquals($username, $user->username);
        $this->assertEquals($email, $user->email);
        $this->assertNotEmpty($user->password_hash);
        $this->assertNotEquals($password, $user->password_hash);
        $this->assertNotEmpty($user->created_at);
        $this->assertNotEmpty($user->auth_key);
        $this->assertEquals(User::STATUS_ACTIVE, $user->status);
    }
}