<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_superadmin_can_see_user_list()
    {
        $this->actingAs(User::find(1));

        $response = $this->get('/user-management/user');

        $response->assertStatus(200);
    }
}
