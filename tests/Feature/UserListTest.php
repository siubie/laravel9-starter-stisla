<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserListTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        # code...
        parent::setUp();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_superadmin_can_see_user_list()
    {
        //login superadmin
        $this->actingAs(User::find(1));

        //buka halaman user
        $response = $this->get('/user-management/user');

        //pastikan response 200
        $response->assertStatus(200);

        //assert ada variabel users
        $response->assertViewHas('users');
    }

    public function test_superadmin_can_see_user_list_paging()
    {
        // $this->withoutExceptionHandling();
        //login superadmin
        $this->actingAs(User::find(1));

        //buka halaman user
        $response = $this->get('/user-management/user');

        //pastikan response 200
        $response->assertStatus(200);

        //assert ada variabel users
        $response->assertViewHas('users');

        $response->assertSeeText('superadmin@gmail.com');

        //buka page 2
        $pageTwo = $this->get('user-management/user?page=2');

        //pastikan response 200
        $pageTwo->assertStatus(200);

        // dd($pageTwo->getContent());
        //assert ada variabel users
        $pageTwo->assertSeeText('12');
    }
}
