<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamsTest extends TestCase
{

    use RefreshDatabase;


    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function testExample()

    // factory('App\User')->create();
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    public function guest_may_not_create_a_team() {
        // $this->withoutExceptionHandling();

        $this->post('/teams')->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_a_team() {

        // $this->withoutExceptionHandling();

        // Given I am a user who is logged in
        $this->actingAs(factory('App\User')->create());
        // When they hit the endpoint / teams to create a new team, while passing the necessary data.

        $attributes = ['name' => 'Acne'];

        $this->post('/teams', $attributes);

        $this->assertDatabaseHas('teams', $attributes);

        // $this->post('/teams', [
        //     // 'owner_id' => '',
        //     'name' => 'Acne'
        // ]);
        // // Then there should be a new in the database
        // $this->assertDatabaseHas('teams', ['name' => 'Acne']);
    }


}
