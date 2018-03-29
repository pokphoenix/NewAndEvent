<?php

namespace Tests\Unit\BackOffice\User;

use Tests\TestCase;
use Faker\Generator as Faker;
use DurianSoftware\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDeleteTest extends TestCase
{
    public function testCaseExample()
    {
        $user = User::first();
        $result = $user->delete();
        $this->assertTrue($result);
    }
}
