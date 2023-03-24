<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
    */
    public function test_example()
    {
        $user = User::factory()->create();
        $this->assertEquals($user->role_id,'2');
    }

    public function test_Case()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
