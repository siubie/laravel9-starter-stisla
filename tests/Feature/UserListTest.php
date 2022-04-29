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

        $response->assertSeeText('superadmin@gmail.com');
    }

    public function test_superadmin_can_see_paging_user_list()
    {
        //login superadmin
        $this->actingAs(User::find(1));

        User::factory()->count(10)->create();

        //buka halaman user
        $response = $this->get('/user-management/user');

        //pastikan response 200
        $response->assertStatus(200);

        //assert ada variabel users
        $response->assertViewHas('users');

        //ada superadmin nya
        $response->assertSeeText('superadmin@gmail.com');

        //ada keliatan text paging nya
        $response->assertSeeTextInOrder(["1", "2"]);

        //buka halaman selanjutnya
        $response = $this->get('/user-management/user?page=2');

        //keliatan paging 11
        $response->assertSeeText("11");
    }
}
