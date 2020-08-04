<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{

	use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function a_user_can_have_a_team()
    {
        // $this->assertTrue(true);
       	$user = factory('App\User')->create();

       	$user->team()->create(['name' => 'Acne']);

       	$this->assertEquals('Acne', $user->team->name);
    }
}
